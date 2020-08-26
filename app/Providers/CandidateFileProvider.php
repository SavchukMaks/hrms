<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CandidateFileService;

class CandidateFileProvider extends ServiceProvider
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
        $this->app->bind('App\Services\CandidateFileService', function(){
            return new CandidateFileService();
        });
    }
}
