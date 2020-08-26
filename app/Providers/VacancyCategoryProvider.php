<?php

namespace App\Providers;

use App\Services\VacancyCategoryService;
use Illuminate\Support\ServiceProvider;

class VacancyCategoryProvider extends ServiceProvider
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
        $this->app->bind('App\Services\VacancyCategoryService', function () {
            return new VacancyCategoryService();
        });
    }
}
