<?php

namespace App\Http\Controllers\DictCandidateType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class CandidateTypeController extends Controller
{
    public function search(Request $request)
    {

        $candidateTypeService = App::make('App\Services\DictCandidateTypesService');
        $searchResult = $candidateTypeService->search($request);

        return $searchResult;

    }
}
