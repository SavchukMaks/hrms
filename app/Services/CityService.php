<?php

namespace App\Services;
use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\City;

class CityService
{
    public function search(Request $request)
    {
        $dataAutocompleteCity = Country::where('title', 'LIKE', '%' . $request->term . '%')
            ->get();

        if (count($dataAutocompleteCity) == 0) {
            $searchResultCity = Country::create(['title' => $request->term,'country_id' => 1]);
        } else {
            foreach ($dataAutocompleteCity as $key => $value)
            {
                $searchResultCity[] = $value->title;
            }
        }
        return $searchResultCity;

    }

    public function getCityId(string $str)
    {
        $dataCity = City::where('title', $str)->get();

        return isset($dataCity[0]) ? $dataCity[0]['id'] : null;

    }

    public function dataCity(string $str,$vacancyId)
    {
        $dataCity = City::where('title', trim($str))->first();
        if(!$dataCity)
        {
            City::insert(['title'=>trim($str), 'country_id' => 1]);
            $dataCity = City::where('title',trim($str))->first();

        }
        Location::where('id',$vacancyId)->update(['city_id'=>$dataCity->id]);

        return $dataCity;
    }

    public function getCountryId($str,$vacancyId)
    {
        $dataCountry = Country::where('title', trim($str))->first();

        if(!$dataCountry)
        {
            Country::insert(['title'=>trim($str)]);
            $dataCountry = Country::where('title',trim($str))->first();
        }
        Location::where('id',$vacancyId)->update(['country_id'=>$dataCountry->id]);

        return $dataCountry;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getCities()
    {
        return City::with('country')->get();
    }
}

