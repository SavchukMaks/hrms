<?php

namespace App\Providers;

use App\Services\OfferService;
use Illuminate\Support\ServiceProvider;

class OfferProvider extends ServiceProvider
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
        $this->app->bind('App\Services\OfferService', function(){
            return new OfferService();
        });
    }
}
