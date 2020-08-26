<?php


namespace App\Services;

use App;
use App\Models\VacancyDictTypes;

class VacancyDictTypeService
{

    public function saveVacancyDictType(int $vacancyId)
    {
        $dictVacancyTypesService = App::make('App\Services\DictCandidateTypesService');
        $dictTypesId = $dictVacancyTypesService->getIdDictCandidateType();

        if (isset($dictTypesId)){
            $arr = array();
            $arrData = $this->getVacancyDictTypes($vacancyId, $dictTypesId, $arr);
            $this->save($arrData);
        }

    }

    public function getVacancyDictTypes(int $vacancyId, $dictTypesId, array $arrData)
    {
        $counter = 0;
        foreach ($dictTypesId as $value){
            $arrData[$counter]['vacancy_id'] = $vacancyId;
            $arrData[$counter]['dict_type_id'] = $value->id;
            $counter++;
        }
        return $arrData;
    }

    public function save(array $arrData)
    {
        for($i = 0; $i < count($arrData); $i++){
            $candidateDictType = new VacancyDictTypes();
            $candidateDictType->fill($arrData[$i]);
            $candidateDictType->save();
        }

        return $this;
    }

}