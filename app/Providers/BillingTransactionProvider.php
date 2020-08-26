<?php

namespace App\Providers;

use App\Services\BillingTransactionService;
use Illuminate\Support\ServiceProvider;

class BillingTransactionProvider extends ServiceProvider
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
        $this->app->bind('App\Services\BillingTransactionService', function(){
            return new BillingTransactionService();
        });
    }
}
