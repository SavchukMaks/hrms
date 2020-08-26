<?php

namespace App\Services;

use App\DomainParams\Candidates;
use App\Models\Vacancy;
use App\Models\City;
use App\Models\Country;
use App;
use Illuminate\Http\Request;
use App\DomainParams\Vacancys;
use App\Models\dict_candidate_types;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class VacancyService {


    public function list($vacancyId)
    {
        $vacancies = Vacancy::whereId($vacancyId)->first();

        return $vacancies;
    }

    public function getEditData($id)
    {
        $vacancyList = $this->getVacancy($id);
        $configDataJson = $this->getConfigData();

        $result = $this->list($id);
        $vacancyType = Vacancy::find($id)->VacancyDictTypes->first();
        if(is_int(Vacancy::find($id))){
            $city_id = Vacancy::find($id)->locations->first()->city_id;
            $city = City::find($city_id);
            $country_id =  Vacancy::find($id)->locations->first()->country_id;
            $country = Country::find($country_id);
        }

        $location = compact(['city','country']);

        $data = ['data' => $result,
            'vacancyType' =>$vacancyType,
            'location' => $location,
            'vacancyList'=>$vacancyList,
            'configDataJson'=>$configDataJson];

        return $data;

    }

    public function delete($candidateId,$vacancyId)
    {
        $data = DB::table('vacancy_candidate')->where(['vacancy_id' => $vacancyId,'candidate_id'=>$candidateId])->first();
        DB::table('vacancy_candidate')->where('id',$data->id)->delete();

        return $this;
    }
    public function updateType()
    {
        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $data = $dictCandidateTypesService->createDictType();

        return $data;

    }

    public function getListAll()
    {
        $vacancy = Vacancy::get();

        return $vacancy;
    }

    public function getVacancy($id)
    {
        $vacancyProfile = Vacancy::where('id', $id)
            ->with('VacancyDictTypes')
            ->first();
        return $vacancyProfile;
    }

    public function updateData(Request $request)
    {
        $data = array();

        $data = $this->getData($request);
        $this->update($request['pk'], $data);

        return $this;
    }

    public function getData(Request $request)
    {
        $arr = array();
        $arr[$request['name']] = $request['value'];
        return $arr;
    }

    public function editLocation(Request $request, LocationService $locationService)
    {
        if ($request['value'] != null){
            $locationData = $locationService->getLocation($request['value'],$request['pk']);
            $data['location_id'] = $locationData->id;
            $this->updateLocation($request['pk'], $data);
        }

        return $this;
    }

    public function update(int $id, array $data)
    {
        $Vacancy = Vacancy::find($id);
        $Vacancy->fill($data);
        $Vacancy->save();

        return $Vacancy;
    }

    public function updateLocation(int $id, array $data)
    {
        $location = App\Models\Location::find($id);
        $location->fill($data);
        $location->save();

        return $location;
    }

    public function getConfigData()
    {
        $configData = [
            'VacancyUpdate' => Vacancys::VACANCY_ROUT_UPDATE,
            'VacancyName' => Vacancys::VACANCY_ROUT_NAME,
        ];

        $configDataJson = json_encode($configData);

        return $configDataJson;
    }

    public function generateUniqueId($vacancy){
        $id_company = $this->formatingNumber($this->getCompanyId());
        $id_vacancy = $this->formatingNumber((int)$vacancy->id);

        return $id_company.'-'.$id_vacancy;
    }

    public function bindUniqueId($vacancy, $unique_id){
        $vacancy->unique_id = $unique_id;
        $vacancy->save();

        return $vacancy;
    }

    public function addVacancy (Request $request, VacancyDictTypeService $vacancyDictTypeService)
    {
        $vacancy = new Vacancy();
        $vacancy->category_id = $request->get('category_id');
        $vacancy->client_id = $request->get('client_id');
        $vacancy->remotely = $request->get('remotely');
        $vacancy->fill($request->all());
        $vacancy->save();

        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $dictCandidateTypesService->create();

        $vacancyDictTypeService->saveVacancyDictType($vacancy->id);

        //@TODO Move generation uniq id on publishing event
        $unique_id = $this->generateUniqueId($vacancy);
        $vacancy = $this->bindUniqueId($vacancy, $unique_id);



        return $vacancy;
    }

    public function formatingNumber($int)
    {
        return sprintf("%'.05d", $int);
    }

    public function getCompanyId()
    {
        return 13;
    }

    public function generateUniqueVacancyId($vacancy){
        $id_company = $this->formatingNumber($this->getCompanyId());
        $id_vacancy = $this->formatingNumber((int)$vacancy->id);
        return $id_company.'-'.$id_vacancy;
    }

    public function getVacancyIdByUniqeId($uniqueId)
    {
        $vacancy = Vacancy::where('unique_id', $uniqueId)->first();
        return $vacancy;

    }

    public function getListTags($sort = '')
    {
        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            $vacanciesTags = Vacancy::with('locations.country')
                ->with('locations.city')
                ->with('vacancyDictTypes')
                ->where('client_id', Auth::user()->id)
                ->where('tags', "LIKE", "%{$sort}%")
                ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

            return $vacanciesTags;
        }

        $vacanciesTags = Vacancy::with('locations.country')
            ->with('locations.city')
            ->with('vacancyDictTypes')
            ->where('tags', "LIKE", "%{$sort}%")
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $vacanciesTags;
    }

    public function getListCategory($id)
    {

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            $vacanciesCategory = Vacancy::with('locations.country')
                ->with('locations.city')
                ->where('client_id', Auth::user()->id)
                ->where('category_id', $id)
                ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));


            return $vacanciesCategory;
        }

        $vacanciesCategory = Vacancy::with('locations.country')
            ->with('locations.city')
            ->where('category_id', $id)
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));


        return $vacanciesCategory;
    }

    public function getListType($sort = '')
    {
        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            $vacanciesType = Vacancy::with('locations.country')
                ->with('locations.city')
                ->with('vacancyDictTypes')
                ->where('client_id', Auth::user()->id)
                ->whereHas('vacancyDictTypes', function($q) use ($sort) {
                    return $q->where('dict_type_id', $sort);
                })->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

            return $vacanciesType;
        }

        $vacanciesType = Vacancy::with('locations.country')
            ->with('locations.city')
            ->with('vacancyDictTypes')
            ->whereHas('vacancyDictTypes', function($q) use ($sort) {
                return $q->where('dict_type_id', $sort);
            })->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $vacanciesType;
    }

    public function getList($sort = '')
    {

        $url = $_SERVER['REQUEST_URI'];

        if(preg_match ('#category#' , $url))
        {
            return $this->getListCategory($sort);
        } else if(preg_match ('#type-candidate#' , $url))
        {
            return $this->getListType($sort);
        } else if(preg_match ('#tags#' , $url))
        {
            return $this->getListTags($sort);
        }

        if(Auth::user()['role'] == Candidates::CLIENT_ROLE){
            $vacancies = Vacancy::with('locations.country')
                ->with('locations.city')
                ->with('vacancyDictTypes')
                ->where('client_id', Auth::user()->id)
                ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));
            return $vacancies;
        }

        $vacancies = Vacancy::with('locations.country')
                ->with('locations.city')
                ->with('vacancyDictTypes')
                ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $vacancies;
    }

    public function search($request)
    {

        $dataAutocomplete = Vacancy::where('title', 'LIKE', '%'.$request->term.'%')
            ->get();

        if (count($dataAutocomplete) == 0){
            $searchResult[] = 'No found!!!';
        }else{
            foreach ($dataAutocomplete as $key => $value)
            {
                $searchResult[] = $value->title;
            }
        }

        return $searchResult;

    }

    public function paginationSearch($request)
    {

        $dataVacancies = Vacancy::search($request->searchItem)
            ->with('locations.country')
            ->with('locations.city')
            ->paginate(env('PAGINATION_COUNT_ELEMENTS', Candidates::DEFAULT_COUNT_PAGINATION));

        return $dataVacancies;

    }

    public function updatesRemotely($id, Request $request)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->remotely = $request->get('remotely');
        $vacancy->save();
    }

    public function updatesCategory($id, Request $request)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->category_id = $request->get('category_id');
        $vacancy->save();
    }

    public function updatesType($id, Request $request)
    {
        $vacancy = Vacancy::find($id);
        $arr = $request->get('selections');
        if(is_array($arr)){
            $type_candidates = implode(", ", $arr);
            $vacancy->type_candidates = $type_candidates;
        }
        $vacancy->save();
    }

}
