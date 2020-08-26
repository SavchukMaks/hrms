<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidatesCount = App::make('App\Services\DashboardService');
        $candidates = $candidatesCount->countCandidate();

        return View ('pages.dashboard', compact('candidates'));
    }

}
