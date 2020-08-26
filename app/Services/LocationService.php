<?php

namespace App\Services;

use App;
use App\Models\Location;

class LocationService
{
    public function createLocation($cityId)
    {
        $location = null;
        if (isset($cityId)){
            $location = new Location();
            $location->fill(array_merge(['city_id' => $cityId], ['country_id' => 1]));
            $location->save();
        }

        return $location;
    }

    public function checkLocation($cityId)
    {
        $location = Location::where('city_id', $cityId)->get();

        return $location;
    }

    public function getLocation(string $str,$vacancyId)
    {
        $cityService = App::make('App\Services\CityService');
        $arr = [];
        array_push($arr,$str);
        $a = explode(",",$arr[0]);
        $cityService->dataCity($a[1],$vacancyId);
        $cityService->getCountryId($a[0],$vacancyId);
        $location = Location::where('id', $vacancyId)->first();

        return $location;
    }

    public function editLocation()
    {

    }



}