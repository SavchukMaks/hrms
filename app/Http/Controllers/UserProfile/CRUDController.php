<?php

namespace App\Http\Controllers\UserProfile;

use App\Http\Controllers\Controller;
use App;

class CRUDController extends Controller
{

    public function edit($id)
    {
        $userProfileService = App::make('App\Services\UserProfileService');
        $userProfile = $userProfileService->getUserProfile($id);

        $configDataJson = $userProfileService->getConfigData();

        return view('pages.user-profile', compact('userProfile', 'configDataJson'));
    }


}