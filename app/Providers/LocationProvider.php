<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\LocationService;

class LocationProvider extends ServiceProvider
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
        $this->app->bind('App\Services\LocationService', function(){
            return new LocationService();
        });
    }
}
