<?php

namespace App\Providers;

use App\Services\CityService;
use Illuminate\Support\ServiceProvider;

class CityProvider extends ServiceProvider
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
        $this->app->bind('App\Services\CityService', function(){
            return new CityService();
        });
    }
}
