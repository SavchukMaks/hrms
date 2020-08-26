<?php

namespace app\Services;

use App\Models\VacancyCategory;

class VacancyCategoryService
{
    public function delete($categoriesId)
    {
        $categories = null;

        if(VacancyCategory::where('id' , $categoriesId)){

            $categories = VacancyCategory::where('id' , $categoriesId)->delete();
        }

        return $categories;
    }
    public function addCategories($categories)
    {
        $result = VacancyCategory::insert(['title' => $categories]);

        return $result;
    }

    public function update($categoriesId,$title)
    {
        $updateData = null;

        if($data = VacancyCategory ::where('id',$categoriesId))
        {
            $updateData = $data->update(['title' => $title]);
        }

        return $updateData;
    }


    public function getCategoriesList()
    {
        $result = VacancyCategory::all();

        return $result;

    }

    public function categories()
    {
        $data = VacancyCategory::get();

        return $data;
    }
}
