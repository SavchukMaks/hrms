<?php

namespace App\Providers;

use App\Services\DashboardService;
use Illuminate\Support\ServiceProvider;

class DashboardProvider extends ServiceProvider
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
        $this->app->bind('App\Services\DashboardService', function () {
            return new DashboardService();
        });
    }
}
