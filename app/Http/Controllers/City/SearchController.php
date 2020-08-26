<?php

namespace App\Http\Controllers\City;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $cityService = App::make('App\Services\CityService');
        $searchResultCity = $cityService->search($request);

        return $searchResultCity;

    }
}
