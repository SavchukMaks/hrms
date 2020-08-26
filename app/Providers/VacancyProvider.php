<?php

namespace App\Providers;

use App\Services\VacancyService;
use Illuminate\Support\ServiceProvider;

class VacancyProvider extends ServiceProvider
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
        $this->app->bind('App\Services\VacancyService', function () {
            return new VacancyService();
        });
    }
}
