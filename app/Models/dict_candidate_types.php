<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dict_candidate_types extends Model
{
    protected $table = 'dict_candidate_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function Vacancy()
    {
        return $this->belongsToMany('App\Models\Vacancy','vacancy_dict_types','vacancy_id','dict_type_id');
    }

    public function candidates()
    {
        return $this->belongsToMany('App\Models\Candidate', 'candidate_dict_types','dict_type_id', 'candidate_id');
    }

}
