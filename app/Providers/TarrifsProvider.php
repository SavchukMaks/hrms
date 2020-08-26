<?php

namespace App\Providers;

use App\Services\TarrifsService;
use Illuminate\Support\ServiceProvider;

class TarrifsProvider extends ServiceProvider
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
        $this->app->bind('App\Services\TarrifsService', function () {
            return new TarrifsService();
        });
    }
}
