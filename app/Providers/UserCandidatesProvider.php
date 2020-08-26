<?php

namespace App\Providers;

use app\Service\UserCandidates\UserCandidatesService;
use Illuminate\Support\ServiceProvider;

class UserCandidatesProvider extends ServiceProvider
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
        $this->app->bind('app\Service\UserCandidates', function () {
            return new UserCandidatesService();
        });
    }
}
