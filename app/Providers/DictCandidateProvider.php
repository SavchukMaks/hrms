<?php

namespace App\Providers;

use App\Services\DictCandidateTypesService;
use Illuminate\Support\ServiceProvider;

class DictCandidateProvider extends ServiceProvider
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
        $this->app->bind('App\Services\DictCandidateTypesService', function () {
            return new DictCandidateTypesService();
        });
    }
}
