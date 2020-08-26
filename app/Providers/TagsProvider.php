<?php

namespace App\Providers;

use app\Service\Tags\TagsService;
use Illuminate\Support\ServiceProvider;

class TagsProvider extends ServiceProvider
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
        $this->app->bind('App\Services\TagsService', function () {
            return new TagsService();
        });
    }
}
