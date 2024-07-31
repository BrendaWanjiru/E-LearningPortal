<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Department;
use App\Observers\DepartmentObserver;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Department::observe(DepartmentObserver::class);
    }

    public function register()
    {
        //
    }
}
