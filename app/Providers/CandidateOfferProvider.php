<?php

namespace App\Providers;

use App\Models\CandidateOffer;
use App\Services\CandidateOfferService;
use Illuminate\Support\ServiceProvider;

class CandidateOfferProvider extends ServiceProvider
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
        $this->app->bind('App\Services\CandidateOfferService', function(){
            return new CandidateOfferService();
        });
    }
}
