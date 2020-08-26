<?php

namespace App\Providers;

use App\Models\Payments;
use App\Services\PaymentsService;
use Illuminate\Support\ServiceProvider;

class PaymentsProvider extends ServiceProvider
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
        $this->app->bind('App\Services\PaymentsService', function(){
            return new PaymentsService();
        });
    }
}
