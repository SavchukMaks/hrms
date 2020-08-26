<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App;

class CountController extends Controller
{
    public function count()
    {
        $candidatesCount = App::make('App\Services\DashboardService');
        $candidates = $candidatesCount->countCandidate();

        return View ('pages.dashboard', compact('candidates'));
    }
}
