<?php


namespace App\Http\Controllers\Vacancy;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LocationService;

class AjaxEditController extends Controller
{
    public function update(Request $request)
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $vacancyService->updateData($request);
        $configDataJson = $vacancyService->getConfigData();

        return response()->json($configDataJson);
    }

    public function updateLocation(Request $request, LocationService $locationService)
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $vacancyService->editLocation($request, $locationService);

        return $request['value'];
    }

    public function updateType(Request $request)
    {
        $vacancyService = App::make('App\Services\VacancyService');
        $result = $vacancyService->updateType($request);

        $dictVacancyTypesService = App::make('App\Services\DictCandidateTypesService');
        $dictTypesId = $dictVacancyTypesService->getIdDictType();

        $dictVacancyTypesService->createVacancyDictType($dictTypesId);

        return $request['value'];
    }

}