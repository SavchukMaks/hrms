<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{

    protected $table = 'vacancys';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title', 'description', 'tags','skills','work_times', 'category_id'];

    /**
     * Get category
     *
     */

    public function categories()
    {
        return $this->belongsTo('App\Models\VacancyCategory');

    }
    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags');
    }

    public function offers()
    {
        return $this->hasOne('App\Models\Offer');
    }

    public function locations()
    {
        return $this->belongsToMany('App\Models\Location');
    }
    public function candidate()
    {
        return $this->belongsToMany(Candidate::class,'vacancy_candidate','vacancy_id','candidate_id');
    }

    public function scopeSearch($query, $strSearch)
    {
        return $query->where('title', 'LIKE', '%'.$strSearch.'%');
    }

    public function candidateTypes()
    {
        return $this->belongsToMany('App\Models\dict_candidate_types');
    }

    public function vacancyDictTypes()
    {
        return $this->belongsToMany('App\Models\dict_candidate_types', 'vacancy_dict_types', 'vacancy_id', 'dict_type_id');
    }

    public function customers()
    {
        return $this->belongsToMany('App\Models\User', 'vacancys_customers', 'vacancy_id', 'customer_id');
    }

    public function task()
    {
        return $this->hasOne('App\Models\Task');
    }

    public function interview()
    {
        return $this->hasOne('App\Models\Interview');
    }

}
