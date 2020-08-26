<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Services\CandidateFileService;
use App\Models\Candidate;
use App\Services\LocationService;
use App\Services\CandidateDictTypeService;
use App\DomainParams\Candidates;
use App\Models\Experience;

class TypeController extends Controller
{

    public function list()
    {
        $candidateService = App::make('App\Services\CandidateService');
        $dataCandidates = $candidateService->listType();

        return view('pages.candidate.candidate-type-list', ['data' => $dataCandidates]);
    }

    public function edit($id)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $dataCandidates = $candidateService->editType($id);

        return view('pages.candidate.candidate-type-edit', ['data' => $dataCandidates]);
    }

    public function update($id, Request $request)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $candidateService->updateType($id, $request);

        return redirect()->route('type_list');
    }

    public function delete($id)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $candidateService->deleteType($id);

        return redirect()->route('type_list');
    }

    public function add()
    {
        return view('pages.candidate.candidate-type-add');
    }

    public function create(Request $request)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $candidateService->createType($request);

        return redirect()->route('type_list');
    }

}
