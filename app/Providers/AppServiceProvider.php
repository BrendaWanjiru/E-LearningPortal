<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\NoteRepositoryInterface;
use App\Repositories\NoteRepository;
use App\Services\Interfaces\NoteServiceInterface;
use App\Services\NoteService;
use App\Models\Note;
use App\Observers\NoteObserver;
use App\Strategies\Interfaces\TokenStrategyInterface;
use App\Strategies\JWTTokenStrategy;
use App\Services\TokenService;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(NoteRepositoryInterface::class, NoteRepository::class);

        $this->app->bind(NoteServiceInterface::class, NoteService::class);

        $this->app->bind(TokenStrategyInterface::class, JWTTokenStrategy::class);
        $this->app->singleton(TokenService::class, function ($app) {
            return new TokenService($app->make(TokenStrategyInterface::class));
        });

    }



    public function boot()
    {
        Note::observe(NoteObserver::class);
    }

}


