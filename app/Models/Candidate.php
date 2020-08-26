<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';


    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'required_position',
        'skills', 'education',
        'experience',
        'description',
        'linkedin',
        'facebook',
        'email',
        'location_id',
        'date_birth',
        'tags',
        'candidate_status_id',
        'category_id',
    ];

    public function tags()
    {
        return $this->hasMany('App\Models\Tags');
    }

    public function candidateCV()
    {
        return $this->hasMany('App\Models\CandidateCV');
    }

    public function vacancy()
    {
        return $this->belongsToMany(Vacancy::class,'vacancy_candidate');
    }

    public function candidateFiles()
    {
        return $this->hasMany('App\Models\CandidateFile');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function statusCandidate()
    {
        return $this->belongsTo('App\Models\Status_Candidate','candidate_status_id');
    }

    public function candidateDictTypes()
    {
        return $this->belongsToMany('App\Models\dict_candidate_types', 'candidate_dict_types', 'candidate_id', 'dict_type_id');
    }


    public function scopeSearch($query, $strSearch)
    {
        $arrData = explode(" ", $strSearch);

        $strQuery = '';
        if(isset($arrData[0]) && isset($arrData[1])){
            $strQuery = $query->where('first_name', 'LIKE', '%'.$arrData[1].'%')
                ->orwhere('last_name', 'LIKE', '%'.$arrData[0].'%');
        }elseif ($arrData[0]){
            $strQuery = $query->where('last_name', 'LIKE', '%'.$arrData[0].'%');
        }

        return $strQuery;
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience', 'candidate_id', 'id');
    }

    public function category()
    {
        return $this->hasOne('App\Models\VacancyCategory', 'id', 'category_id');
    }
}
