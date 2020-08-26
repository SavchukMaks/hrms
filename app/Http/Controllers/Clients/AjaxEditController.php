<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Services\ClientsService;
use Illuminate\Http\Request;
use App;

class AjaxEditController extends Controller
{

    public function update(Request $request, ClientsService $userProfileService)
    {
        $userProfileService->updateData($request);
        $configDataJson = $userProfileService->getConfigData();

        return response()->json($configDataJson);

    }

}
