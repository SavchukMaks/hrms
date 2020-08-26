<?php

namespace App\Providers;

use App\Services\TestTaskService;
use Illuminate\Support\ServiceProvider;

class TestTaskProvider extends ServiceProvider
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
        $this->app->bind('App\Services\TestTaskService', function () {
            return new TestTaskService();
        });
    }
}
