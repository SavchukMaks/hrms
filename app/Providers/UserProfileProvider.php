<?php

namespace App\Providers;

use App\Services\UserProfileService;
use Illuminate\Support\ServiceProvider;

class UserProfileProvider extends ServiceProvider
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
        $this->app->bind('App\Services\UserProfileService', function(){
            return new UserProfileService();
        });
    }
}
