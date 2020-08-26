<?php

namespace App\Services;

use App\DomainParams\Candidates;
use App\DomainParams\Sessions;
use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Location;
use App\Models\Experience;
use App\Models\dict_candidate_types;
use App;
use DB;

class CandidateService
{
    use ValidatesRequests;

    public function addCandidate(Request $request, CandidateFileService $candidateFileService,
                                 LocationService $locationService, CandidateDictTypeService $candidateDictTypeService)
    {

        $locationData = $locationService->checkLocation($request['location']);
        if($locationData->count() < 1){
            $location = $locationService->createLocation($request['location']);
        }else{
            $location = $locationData[0];
        }

        $candidate = new Candidate();
        if(isset($location->id)){
            $arrData = array('location_id' => $location->id);
        }else{
            $arrData = array('location_id' => null);
        }

        $arrData['category_id'] = (int) $request['category'];

        if(isset($_FILES['photoCandidate'])){

            $path = public_path() . Candidates::CANDIDATE_IMG_FILE_PATH; ;
            $name = time() . $_FILES["photoCandidate"]["name"];
            if(move_uploaded_file($_FILES["photoCandidate"]["tmp_name"],  $path . $name)){
                $candidate->photoCandidate = $name;
            }

        }


        $candidate->fill( array_merge($request->all(), $arrData));
        $candidate->save();
        $candidateFileService->saveFiles($candidate);

        $id = $candidate->id;



        if(!empty($request->get('company_experience')) && !empty($request->get('position_experience')))
        {
            $experience = new Experience();

            $start_date =  \Carbon\Carbon::parse($request->get('start_date_experience'))->format('Y');
            $end_date =  \Carbon\Carbon::parse($request->get('end_date_experience'))->format('Y');

            if($end_date === null)
            {
                $end_date = date('Y');
            }
            $sum = $end_date - $start_date;
            $experience->candidate_id = $id;
            $experience->start_date = $request->get('start_date_experience');
            $experience->end_date = $request->get('end_date_experience');
            $experience->sum_experience = $sum;
            $experience->company = $request->get('company_experience');
            $experience->position = $request->get('position_experience');
            $experience->location = $request->get('location_experience');
            $experience->save();
        }

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $dictCandidateTypesService->create();

        $candidateDictTypeService->saveCandidateDictType($candidate->id);

        return $candidate;

    }

    public function setExperience($id, Request $request)
    {
        $experience = new Experience();

        $candidate = Candidate::with('experiences')->findOrFail($id);

        $start_date =  \Carbon\Carbon::parse($request->get('start_date'))->format('Y');
        $end_date =  \Carbon\Carbon::parse($request->get('end_date'))->format('Y');

        if($end_date === null)
        {
            $end_date = date('Y');
        }
        if(($candidate->experiences)->isNotEmpty()){
            $candidat = $candidate->experiences->last();
            $sum = $candidat->sum_experience + ($end_date - $start_date);
            $experience1 = Experience::orderBy('id', 'desc')->first();
            $experience1->sum_experience = null;
            $experience1->save();
        } else{
            $sum = $end_date - $start_date;
        }

        $experience->candidate_id = $id;
        $experience->start_date = $request->get('start_date');
        $experience->end_date = $request->get('end_date');
        $experience->sum_experience = $sum;
        $experience->company = $request->get('company');
        $experience->position = $request->get('position');
        $experience->location = $request->get('location');

        $experience->save();
    }

    public function getExperience($id)
    {
        $experience = Experience::findOrFail($id);
        return $experience;
    }

    public function editExperience($id, Request $request)
    {
        $experience = Experience::findOrFail($id);

        $start_date =  \Carbon\Carbon::parse($request->get('start_date'))->format('Y');
        $end_date =  \Carbon\Carbon::parse($request->get('end_date'))->format('Y');

        if($end_date === null)
        {
            $end_date = date('Y');
        }
        $sum = $end_date - $start_date;

        $experience->start_date = $request->get('start_date');
        $experience->end_date = $request->get('end_date');
        $experience->sum_experience = $sum;
        $experience->company = $request->get('company');
        $experience->position = $request->get('position');
        $experience->location = $request->get('location');

        $experience->save();
    }
    public function getCandidates($vacancyId)
    {
        if ($vacancy = Vacancy::whereId($vacancyId)->first()) {
            $candidates = Candidate::where('skills', 'LIKE', "%{$vacancy->title}%")
                ->limit(10)
                ->orderBy('id', SORT_DESC)
                ->get();
            return $candidates;
        }
    }

    public function getStatusId($request)
    {
        return isset($request) ? $request : null;
    }


    public function tempSave(Request $request)
    {
        $tempFilePath ='';

        if($request->hasFile('tempFile')) {
            $this->cleanTempFile();

            $file = $request->file('tempFile');
            $fileName = $file->getClientOriginalName();
            $file->move(public_path() . Candidates::CANDIDATE_TEMP_FILE_PATH, $fileName);
            $tempFilePath = Candidates::CANDIDATE_TEMP_FILE_PATH . $fileName;

            $this->addPhotoToSession($tempFilePath);
        }

        return $tempFilePath;

    }

    public function addDataToSession($key, $value)
    {
        session()->put($key, $value);
    }

    public function getDataFromSession($key)
    {
        return session()->get($key);
    }

    public function addPhotoToSession(String $tempFilePath)
    {
        $route = request()->route()->getName();
        if ($route == Candidates::CANDIDATE_ROUT_UPLOAD_PHOTO){
            $this->addDataToSession(Sessions::SESSION_PHOTO, $tempFilePath);
        }

        return $this;

    }

    public function getView($id)
    {
        $candidate = Candidate::with('experiences')->find($id);

        $locationId = Candidate::find($id)->location_id;
        $image = Candidate::find($id)->photoCandidate;
        $array = ['candidate' => $candidate, 'image' => $image];
        if($locationId){
            $city = Location::find($locationId)->city;
            $country = Location::find($locationId)->country;
            $array = ['candidate' => $candidate, 'city' => $city, 'country' => $country, 'image' => $image];
        }


        return $array;
    }

    public function cleanTempFile()
    {

        if(request()->is(Candidates::CANDIDATE_PHOTO_SAVE_PATH)){
            if (session()->has('photo')){
                $tempFile = public_path() . $this->getDataFromSession(Sessions::SESSION_PHOTO);
                unlink($tempFile);
                session()->forget('photo');
            }
        }

        return $this;

    }

//    public function list()
//    {
//        $candidates = Candidate::with('location.country')
//            ->with('location.city')
//            ->with('category')
//            ->with('candidateDictTypes')
//            ->with(['candidateFiles' => function($query) {
//                return $query->where('file_type', Candidates::CANDIDATE_FILE_PHOTO);
//            }])
//            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));
//
//        return $candidates;
//    }

    public function getDateInFormatUnix()
    {
        $arr = explode("-", request()->date_birth);
        return mktime('0', '0', '0', $arr[1], $arr[2], $arr[0]);
    }

    public function getSearchAutocomplete($request)
    {

        $dataAutocomplete = Candidate::where('first_name', 'LIKE', '%'.$request->term.'%')
            ->orwhere('last_name', 'LIKE', '%'.$request->term.'%')
            ->get();

        if (count($dataAutocomplete) == 0){
            $searchResult[] = 'No found!!!';
        }else{
            foreach ($dataAutocomplete as $key => $value)
            {
                $strSearch = $value->last_name ." ". $value->first_name;
                $searchResult[] = $strSearch;
            }
        }

        return $searchResult;

    }

    public function getSearch($request)
    {

        $dataVacancies = Candidate::search($request->searchItem)
            ->with('location.country')
            ->with('location.city')
            ->with('category')
            ->with('candidateDictTypes')
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $dataVacancies;

    }

    public function validation($request)
    {
        $this->validate($request, [
            'searchItem' => 'required|min:3|max:255',
        ]);
    }

    public function getDataCandidate($id)
    {
        $candidate = Candidate::where('id', $id)
            ->with('location.country')
            ->with('location.city')
            ->with('candidateFiles')->first();

        return $candidate;
    }

    public function getConfigData(int $id = null)
    {
        $configData = ['uploadPhotoUrl'=>Candidates::UPLOAD_PHOTO_URL,
                        'candidateTypeSearchAutocomplete'=>Candidates::CANDIDATE_TYPE_SEARCH_AUTOCOMPLETE,
                        'updatePhotoUrl'=>Candidates::UPLOAD_UPDATE_PHOTO_URL,
                        'deletePhotoUrl'=>Candidates::DELETE_PHOTO_URL, 'id'=>$id,
                        'updateCandidate'=>Candidates::CANDIDATE_UPDATE,
                        'updateCandidateLocation'=>Candidates::CANDIDATE_UPDATE_LOCATION,
                        'citySearchAutocomplete'=>Candidates::CITY_SEARCH_AUTOCOMPLETE,
                        'editeLink'=>Candidates::CANDIDATE_EDIT_LINK,
                        'candidateUpdateSkills'=>Candidates::CANDIDATE_UPDATE_SKILLS,
                        'candidateDeleteSkills'=>Candidates::CANDIDATE_DELETE_SKILLS,
                        'candidateEditFile'=>Candidates::CANDIDATE_EDIT_FILE,
                        'candidateDeleteFile'=>Candidates::CANDIDATE_DELETE_FILE,];

        $configDataJson = json_encode($configData);

        return $configDataJson;
    }

    public function updateData($request)
    {
        $data = array();
        if($request['name'] == Candidates::CANDIDATE_UPDATE_NAME && $request['value'] != null) {
            $data = $this->getName($request);
        }else {
            $data = $this->getData($request);
        }

        $this->update($request['pk'], $data);

        return $this;
    }

    public function updateStatus($request)
    {
        $result = Candidate::where('id',$request['pk'])->update(['candidate_status_id'=>$request['value']]);

        return $result;
    }

    public function getName(Request $request)
    {
        $arrName = array();
        $arr = explode(' ', $request['value']);
        $arrName['first_name'] = $arr[0];
        $arrName['last_name'] = $arr[1];

        return $arrName;
    }

    public function update(int $id, array $data)
    {
        $candidate = Candidate::find($id);
        $candidate->fill($data);
        $candidate->save();

        return $candidate;
    }

    public function getData(Request $request)
    {
        $arr = array();
        $arr[$request['name']] = $request['value'];
        return $arr;
    }

    public function changeLink(Request $request)
    {
        $data[$request['input']] = $request['val'];
        $this->update($request['id'], $data);

        return $this;
    }

    public function editSkills(Request $request)
    {
        $candidate = Candidate::find($request['id']);
        $arrOldSkills = count($candidate['skills']) > 0 ? explode(',', $candidate['skills']) : array();
        $arrNewSkill = array($request['skill']);
        $difference = array_diff($arrNewSkill, $arrOldSkills);
        if(count($difference) > 0){
            $mergeSkills = array_merge ($arrOldSkills, $difference);
            $data['skills'] = implode(',', $mergeSkills);
            $candidate->fill(['skills' => $data['skills']]);
            $candidate->save();
        }

        return $request['skill'];
    }

    public function deleteSkills(Request $request)
    {
        $candidate = Candidate::find($request['id']);
        if(isset($candidate)){
            if (isset($candidate['skills'])){
                $skills = explode(',', $candidate['skills']);
                if (($key = array_search($request['skill'], $skills)) !== false) {
                    unset($skills[$key]);
                }
                $data['skills'] = implode(',', $skills);
                $candidate->fill(['skills' => $data['skills']]);
                $candidate->save();
                return '';
            }
        }
        return $request['skill'];
    }

    public function editLocation(Request $request, LocationService $locationService)
    {
        $locationData = $locationService->checkLocation($request['value']);
        if($locationData->count() < 1){
            $location = $locationService->createLocation($request['value']);
        }else{
            $location = $locationData[0];
        }
        $data['location_id'] = $location->id;
        $this->update($request['pk'], $data);

        return $this;
    }

    public function listType()
    {
        $type = dict_candidate_types::paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));
        return $type;
    }

    public function editType($id)
    {
        $type = dict_candidate_types::findOrFail($id);
        return $type;
    }

    public function updateType($id, Request $request)
    {
        $type = dict_candidate_types::findOrFail($id);
        $type->title = $request->get('type_title');
        $type->save();
    }

    public function deleteType($id)
    {
        return dict_candidate_types::destroy($id);
    }

    public function createType(Request $request)
    {
        $type = new dict_candidate_types();
        $type->title = $request->get('type_title');
        $type->save();
    }

    public function getListTags($sort = '')
    {
        $candidatesTags = Candidate::with('location.country')
            ->with('location.city')
            ->with('candidateDictTypes')
            ->where('tags', "LIKE", "%{$sort}%")
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $candidatesTags;
    }

    public function getListCountry($sort = '')
    {
        $candidatesCountry = Candidate::with('candidateDictTypes')
            ->with('location.city', 'location.country')->whereHas('location.city', function($q) use ($sort) {
            return $q->where('title', 'like', "%{$sort}%");
        })->orWhereHas('location.country', function($q) use ($sort) {
                return $q->where('title', 'like', "%{$sort}%");
        })->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $candidatesCountry;
    }

    public function getListAge($sort = '')
    {
        if($sort !== '')
        {
            $sort = date('Y') - $sort;
        }
        $candidatesAge = Candidate::with('location.country')
            ->with('location.city')
            ->with('candidateDictTypes')
            ->where('date_birth', "LIKE", "%{$sort}%")
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $candidatesAge;
    }

    public function getListExperience($sort = '')
    {
        $candidatesExperience = Candidate::with('location.country')
            ->with('location.city')
            ->with('candidateDictTypes')
            ->with(['candidateFiles' => function($query) {
                return $query->where('file_type', Candidates::CANDIDATE_FILE_PHOTO);
            }])->with('experiences')->whereHas('experiences', function($q) use ($sort) {
                if($sort >= 4)
                {
                    return $q->where('sum_experience', '>=', $sort);
                } else {
                    return $q->where('sum_experience', $sort);
                }
            })->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $candidatesExperience;
    }

    public function getListAll()
    {
        $candidates = Candidate::with('location.country')
            ->with('location.city')
            ->with('candidateDictTypes')
            ->with(['candidateFiles' => function($query) {
                return $query->where('file_type', Candidates::CANDIDATE_FILE_PHOTO);
            }])
            ->get();


        return $candidates;
    }


    public function getList()
    {
        $candidates = Candidate::with('location.country')
            ->with('location.city')
            ->with('candidateDictTypes')
            ->with('category')
            ->with(['candidateFiles' => function($query) {
                return $query->where('file_type', Candidates::CANDIDATE_FILE_PHOTO);
            }])
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));


        return $candidates;
    }

    public function list($sort = '')
    {

        $url = $_SERVER['REQUEST_URI'];

        if(preg_match ('#experience#', $url))
        {
            return $this->getListExperience($sort);
        }
        else if(preg_match ('#tags#', $url))
        {
            return $this->getListTags($sort);
        }
        else if(preg_match ('#country#', $url))
        {
            return $this->getListCountry($sort);
        }
        else if(preg_match ('#age#', $url))
        {
            return $this->getListAge($sort);
        }

        return $this->getList();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllCandidates()
    {
        return Candidate::all();
    }

}