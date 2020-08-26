<?php

namespace App\Providers;

use App\Services\CompanyUsers\CompanyUsersService;
use Illuminate\Support\ServiceProvider;

class CompanyUsersProvider extends ServiceProvider
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
        $this->app->bind('app\Services\CompanyUsers', function (){
            return new CompanyUsersService();
        });
    }
}
