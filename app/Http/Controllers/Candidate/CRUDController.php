<?php

namespace App\Http\Controllers\Candidate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;
use App\Services\CandidateFileService;
use App\Models\Candidate;
use App\Services\LocationService;
use App\Services\CityService;
use App\Services\CandidateDictTypeService;
use App\DomainParams\Candidates;
use App\Models\Experience;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class CRUDController extends Controller
{
    public function view($id)
    {
        $candidateView = App::make('App\Services\CandidateService');
        $data = $candidateView->getView($id);
        if(!$data)
        {
            return redirect('candidate/list');
        }

        if(isset($data['city']) || isset($data['country'])){
            return view('pages.view-candidate',['data' => $data, 'city' => $data['city'], 'country' => $data['country'], 'image' => $data['image']]);
        }else{
            return view('pages.view-candidate',['data' => $data, 'image' => $data['image']]);
        }

    }


    public function experienceCreate($id, Request $request)
    {
        $candidateView = App::make('App\Services\CandidateService');
        $candidateView->setExperience($id, $request);
        return redirect()->back();
    }

    public function experienceDelete($id)
    {
        $one = Experience::find($id);
        $one->delete();
        return redirect()->back();
    }

    public function experienceEditPage($id)
    {
        $candidateView = App::make('App\Services\CandidateService');
        $experience = $candidateView->getExperience($id);

        return view('pages.candidate.edit-experience', compact('experience'));
    }

    public function experienceEdit($id, Request $request)
    {
        $candidateView = App::make('App\Services\CandidateService');
        $candidateView->editExperience($id, $request);

        return redirect()->back();
    }

    public function create(Request $request, CityService $cityService)
    {
        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            abort(403);
        }

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $typesCandidate = $dictCandidateTypesService->getDictTypes();
        $categories = $dictCandidateTypesService->getCategory();

        $configData = ['uploadPhotoUrl' => Candidates::UPLOAD_PHOTO_URL, 'citySearchAutocomplete' => Candidates::CITY_SEARCH_AUTOCOMPLETE,
            'candidateTypeSearchAutocomplete' => Candidates::CANDIDATE_TYPE_SEARCH_AUTOCOMPLETE];
        $configDataJson = json_encode($configData);

        $cities = $cityService->getCities();

        if($request->vacancyID) {
            return view('pages.add-candidate', [
                'configDataJson' => $configDataJson,
                'typesCandidate' => $typesCandidate,
                'vacancyID' => $request->vacancyID,
                'cities' => $cities,
                'categories' => $categories,
            ]);
        }

        return view('pages.add-candidate', [
            'configDataJson' => $configDataJson,
            'typesCandidate' => $typesCandidate,
            'cities' => $cities,
            'categories' => $categories,
        ]);
    }

    public function save(Request $request, CandidateFileService $candidateFileService, LocationService $locationService, CandidateDictTypeService $candidateDictTypeService)
    {
        $candidateService = App::make('App\Services\CandidateService');
        $data = $candidateService->addCandidate($request, $candidateFileService, $locationService, $candidateDictTypeService);
        if($request->input('vacancyID'))
        {
            $this->addCandidateToVacancy($data->id, $request->input('vacancyID'));

            return redirect()->route('vacancy_list');
        }

        return redirect()->route('page_add_candidates');
    }

    public function addCandidateToVacancy($candidateId,$vacancyId)
    {
        $candidate = Candidate::find($candidateId);

        if ($candidate)
        {
            $candidate->vacancy()->attach($vacancyId);
        }

        return $this;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param null $id
     * @param CityService $cityService
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id = null, CityService $cityService)
    {
        $candidateService = App::make('App\Services\CandidateService');

        $candidate = $candidateService->getDataCandidate($id);

        $configDataJson = $candidateService->getConfigData($id);

        $cities = [];
        foreach ($cityService->getCities()->toArray() as $value) {
            $cities[] = [
                'value' => $value['id'],
                'text' => implode(', ', [$value['title'], $value['country']['title']]),
            ];
        }

        return view('pages.edit-candidate', compact('candidate', 'configDataJson', 'id', 'cities'));
    }

    public function list($sort = '')
    {
        $candidateService = App::make('App\Services\CandidateService');
        $dataCandidates = $candidateService->list($sort);

        $configData = ['candidateSearchAutocomplete'=>Candidates::CANDIDATE_SEARCH_AUTOCOMPLETE];
        $configDataJson = json_encode($configData);

        return view('pages.candidate.candidate-list',
            [
                'data' => $dataCandidates->appends(Input::except('page')),
                'configDataJson'=> $configDataJson,
            ]);

    }

    public function delete($id)
    {
        Candidate::destroy($id);
        return redirect()->route('candidate_list');
    }
}
