<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DomainParams\Candidates;
use App;

class SearchController  extends Controller
{

    public function searchAutocomplete(Request $request)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $searchResult = $candidateService->getSearchAutocomplete($request);

        return $searchResult;

    }

    public function search(Request $request)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $candidateService->validation($request);
        $data = $candidateService->getSearch($request);

        $strSearch = $request->searchItem;

        $configData = ['candidateSearchAutocomplete'=>Candidates::CANDIDATE_SEARCH_AUTOCOMPLETE];
        $configDataJson = json_encode($configData);

        return view('pages.candidate.candidate-list', compact('data', 'strSearch', 'configDataJson'));

    }


}