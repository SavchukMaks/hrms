<?php

namespace App\Http\Controllers\Candidate;

use App\DomainParams\Candidates;
use App\Services\CandidateService;
use App\Services\CandidateFileService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function save(Request $request, CandidateService $candidateService)
    {
        $tempPhotoCandidate = $candidateService->tempSave($request);

        return $tempPhotoCandidate;
    }

    public function update(Request $request, CandidateFileService $candidateFileService)
    {
        $pathPhotoCandidate = $candidateFileService->updatePhoto($request);
        $candidateFileService->createFile($request, Candidates::CANDIDATE_FILE_PHOTO);

        return $pathPhotoCandidate;
    }

    public function edit(CandidateFileService $candidateFileService)
    {
        if (\request()->has('fileName')){
            $candidateFileService->deletePhoto();
            $candidateFileService->deleteFile(\request()->input('id'), Candidates::CANDIDATE_FILE_PHOTO);
        }

        return redirect()->back();
    }

}
