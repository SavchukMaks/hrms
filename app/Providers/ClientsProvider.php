<?php

namespace App\Providers;

use App\Services\ClientsService;
use Illuminate\Support\ServiceProvider;

class ClientsProvider extends ServiceProvider
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
        $this->app->bind('App\Services\ClientsService', function(){
            return new ClientsService();
        });
    }
}
