<?php

namespace App\Providers;

use App\Services\CandidateService;
use Illuminate\Support\ServiceProvider;

class CandidateProvider extends ServiceProvider
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
        $this->app->bind('App\Services\CandidateService', function(){
            return new CandidateService();
        });
    }
}
