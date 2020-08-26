<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'sort_candidate' => 'required',
            'tags' =>'required',
            'skills' =>'required|string|',
            'work_times' =>'required',
            'description' =>'required|string|',
            'location' =>'required|string|',
        ];
    }
}
