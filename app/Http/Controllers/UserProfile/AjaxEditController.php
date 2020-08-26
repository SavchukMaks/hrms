<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App\Services\UserProfileService;
use App\Services\LocationService;
use Illuminate\Http\Request;
use App;

class AjaxEditController extends Controller
{

    public function update(Request $request, UserProfileService $userProfileService)
    {

        $userProfileService->updateData($request);
        $configDataJson = $userProfileService->getConfigData();

        return response()->json($configDataJson);

    }

    public function updateLocation(Request $request, UserProfileService $userProfileService, LocationService $locationService)
    {
        $userProfileService->editLocation($request, $locationService);

        return $request['value'];

    }
}