<?php

namespace App\Services;

use App;
use App\Models\CandidateDictType;


class CandidateDictTypeService
{
    public function saveCandidateDictType(int $candidateId)
    {
        $dictCandidateTypesService = App::make('App\Services\DictCandidateTypesService');
        $candidateDictTypes = $dictCandidateTypesService->getIdDictCandidateType();

        if (isset($candidateDictTypes)){
            $arr = array();
            $arrData = $this->getCandidateDictTypes($candidateId, $candidateDictTypes, $arr);
            $this->save($arrData);
        }

    }

    private function getCandidateDictTypes(int $candidateId, $candidateDictTypes, array $arrData)
    {
        $counter = 0;
        foreach ($candidateDictTypes as $candidateDictType){
            $arrData[$counter]['candidate_id'] = $candidateId;
            $arrData[$counter]['dict_type_id'] = $candidateDictType->id;
            $counter++;
        }
        return $arrData;
    }

    private function save(array $arrData)
    {
        for($i = 0; $i < count($arrData); $i++){
            $candidateDictType = new CandidateDictType();
            $candidateDictType->fill($arrData[$i]);
            $candidateDictType->save();
        }
        return $this;
    }

}