<?php

namespace App\Providers;

use App\Services\BillingSettingsService;
use Illuminate\Support\ServiceProvider;

class BillingSettingsProvider extends ServiceProvider
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
        $this->app->bind('App\Services\BillingSettingsService', function(){
            return new BillingSettingsService();
        });
    }
}
