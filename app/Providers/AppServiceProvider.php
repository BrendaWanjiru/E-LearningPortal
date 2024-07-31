<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\DepartmentRepository;
use App\Services\DepartmentService;
use App\Course;
use App\Observers\CourseObserver;
use App\Services\CourseService;
use App\Repositories\CourseRepository;
use App\User;
use App\Observers\UserObserver;
use App\Repositories\UserRepository;
use App\Services\UserService;
use App\Repositories\LecturerRepository;
use App\Services\LecturerService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(DepartmentRepository::class, function ($app) {
            return new DepartmentRepository();
        });

        $this->app->singleton(DepartmentService::class, function ($app) {
            return new DepartmentService($app->make(DepartmentRepository::class));
        });

        $this->app->singleton(CourseRepository::class, function ($app) {
            return new CourseRepository();
        });

        $this->app->singleton(CourseService::class, function ($app) {
            return new CourseService($app->make(CourseRepository::class));
        });

        $this->app->singleton(UserRepository::class, function ($app) {
            return new UserRepository();
        });

        $this->app->singleton(UserService::class, function ($app) {
            return new UserService($app->make(UserRepository::class));
        });

        
    }

    public function boot()
    {
        //
    }
}

