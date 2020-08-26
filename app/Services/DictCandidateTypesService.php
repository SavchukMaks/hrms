<?php

namespace App\Services;

use App\Models\dict_candidate_types;
use App\Models\VacancyCategory;
use Illuminate\Http\Request;
use App\Models\VacancyDictTypes;

class DictCandidateTypesService
{
    public function search(Request $request)
    {
        $dataAutocomplete = dict_candidate_types::where('title', 'LIKE', '%' . $request->vacancy_add . '%')
            ->get();

        if (count($dataAutocomplete) == 0){
            $searchResult = dict_candidate_types::create(['title' => $request->vacancy_add]);
        }else{
            foreach ($dataAutocomplete as $value)
            {
                $searchResult[] = $value->title;
            }
        }

        return $searchResult;
    }

    public function getIdDictCandidateType()
    {

        $dataType = dict_candidate_types::whereIn('title', request()->selections)->get();
        return $dataType;
    }

    public function getDictTypes()
    {
        $dictTypes = dict_candidate_types::all();

        return $dictTypes;
    }

    public function getCategory(){

        $category = VacancyCategory::all();

        return $category;

    }

    public function create()
    {
        $arrData = $this->getDataDictTypes();

        for($i = 0; $i < count($arrData); $i++) {
            $candidate = new dict_candidate_types();
            $candidate->fill($arrData[$i]);
            $candidate->save();
        }

        return $this;
    }

    public function getDataDictTypes()
    {
        $currentDictTypes = request()->selections;
        $oldArr = $this->getOldDictTypes();

        $newDictTypes = $this->getNewDictTypes($currentDictTypes, $oldArr);
        return $newDictTypes;
    }

    public function getOldDictTypes()
    {
        $oldDictTypes = $this->getDictTypes()->toArray();
        $oldArr = array();
        $i = 0;
        foreach ($oldDictTypes as $dictType){
            $oldArr[$i] = $dictType['title'];
            $i++;
        }

        return $oldArr;
    }

    public function getNewDictTypes($currentDictTypes, $oldArr)
    {
        $newDictTypes = array_diff($currentDictTypes, $oldArr);
        $data = array();
        $i = 0;
        foreach ($newDictTypes as $dictType){
            $data[$i]['title'] = $dictType;
            $i++;
        }

        return $data;
    }

    public function createDictType()
    {
        $arrData = $this->getDictTypesCandidate();

        for($i = 0; $i < count($arrData); $i++) {
            $dictCandidateTypes = new dict_candidate_types();
            $dictCandidateTypes->fill($arrData[$i]);
            $dictCandidateTypes->save();
        }

        return $this;
    }

    public function getDictTypesCandidate()
    {
        $currentDictTypes = array(request()->value);
        $oldArr = $this->getOldDictTypes();

        $newDictTypes = $this->getNewDictTypes($currentDictTypes, $oldArr);
        return $newDictTypes;
    }

    public function getIdDictType()
    {
        $dataType = dict_candidate_types::where('title', request()->value)->first();
        $id = $dataType['id'] != null ? $dataType['id'] : null;
        return $id;
    }

    public function createVacancyDictType(int $id)
    {
        if($id !== null){
            $idVacancy = (int)request()->pk;
            $vacancyDictTypes = VacancyDictTypes::where('vacancy_id', $idVacancy)->first();

            $arrData = array('vacancy_id' => $idVacancy, 'dict_type_id' => $id);
            if($vacancyDictTypes !== null && $vacancyDictTypes['dict_type_id'] !== $id){
                $vacancyDictTypes->update($arrData);
            }else{
                $vacancyDictTypes = new VacancyDictTypes();
                $vacancyDictTypes->fill($arrData);
                $vacancyDictTypes->save($arrData);
            }

        }
    }

}