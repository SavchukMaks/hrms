<?php

namespace App\Providers;

use app\Services\Company\CompanyService;
use Illuminate\Support\ServiceProvider;

class CompanyProvider extends ServiceProvider
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
        $this->app->bind('app\Services\Company', function (){
            return new CompanyService();
        });
    }
}
