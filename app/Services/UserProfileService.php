<?php

namespace App\Services;

use App\DomainParams\UserProfiles;
use App\Interfaces\IUpdateUserProfile;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileService implements IUpdateUserProfile
{

    public function getUserProfile($id)
    {
        $userProfile = UserProfile::where('id', $id)
            ->with('location.country')
            ->with('location.city')
            ->with('balance')
            ->first();
        return $userProfile;
    }

    public function updateData(Request $request)
    {
        $data = array();
        if($request['name'] == UserProfiles::USER_PROFILE_UPDATE_NAME && $request['value'] != null) {
            $data = $this->getName($request);
        }else {
            $data = $this->getData($request);
        }

        $this->update($request['pk'], $data);

        return $this;
    }

    public function getName(Request $request)
    {
        $arrName = array();
        $arr = explode(' ', $request['value']);
        $arrName['firstname'] = $arr[0];
        $arrName['lastname'] = $arr[1];

        return $arrName;
    }

    public function update(int $id, array $data)
    {
        $UserProfile = UserProfile::find($id);
        $UserProfile->fill($data);
        $UserProfile->save();

        return $UserProfile;
    }

    public function getData(Request $request)
    {
        $arr = array();
        $arr[$request['name']] = $request['value'];
        return $arr;
    }

    public function getConfigData()
    {
        $configData = [
            'userProfileUpdate'=>UserProfiles::USER_PROFILE_UPDATE,
            'userProfileUpdateName'=>UserProfiles::USER_PROFILE_UPDATE_NAME,
            'citySearchAutocomplete'=>UserProfiles::CITY_SEARCH_AUTOCOMPLETE,
        ];

        $configDataJson = json_encode($configData);

        return $configDataJson;
    }

    public function editLocation(Request $request, LocationService $locationService)
    {
        if ($request['value'] != null){
            $locationData = $locationService->checkLocation($request['value']);
            $location = $locationData->count() < 1 ? $locationService->createLocation($request['value']) : $locationData[0];
            $data['location_id'] = $location->id;
            $this->update($request['pk'], $data);
        }

        return $this;
    }
}