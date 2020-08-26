<?php

namespace App\Providers;

use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class TaskProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\TaskService', function () {
            return new TaskService();
        });
    }
}
