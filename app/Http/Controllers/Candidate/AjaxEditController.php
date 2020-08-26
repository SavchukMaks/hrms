<?php

namespace App\Http\Controllers\Candidate;

use App\DomainParams\Candidates;
use App\Http\Controllers\Controller;
use App\Services\CandidateService;
use App\Services\LocationService;
use App\Services\CandidateFileService;
use Illuminate\Http\Request;
use App;

use Validator;

class AjaxEditController extends Controller
{


    public function update(Request $request, CandidateService $candidateService)
    {
        $candidateService->updateData($request);
        $configDataJson = $candidateService->getConfigData();
        return response()->json($configDataJson);

    }
    public function updateStatus(Request $request, CandidateService $candidateService)
    {
        $candidateService->updateStatus($request);
        $data = $request['pk'];
        return response()->json($data);
    }

    public function updateLocation(Request $request, CandidateService $candidateService,
                                   LocationService $locationService)
    {
        $candidateService->editLocation($request, $locationService);

        return $request['value'];
    }

    public function updateSkills(Request $request, CandidateService $candidateService)
    {
        $skill = $candidateService->editSkills($request);

        return $skill;
    }

    public function editLink(Request $request, CandidateService $candidateService)
    {
        $candidateService->changeLink($request, $candidateService);

        return $request;
    }

    public function deleteSkills(Request $request, CandidateService $candidateService)
    {
        $result = $candidateService->deleteSkills($request);

        return $result;
    }

    public function editFile(Request $request, CandidateFileService $candidateFileService)
    {
        $candidateFileService->updateFile($request,Candidates::COLUMN_FILE_NAME);

        return $request;
    }

    public function deleteFile(Request $request, CandidateFileService $candidateFileService)
    {
        $candidateFileService->deleteFileCandidate($request['id'], Candidates::COLUMN_FILE_NAME, $request['fileName']);

        return $request;
    }
}