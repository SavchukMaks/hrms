<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'tasks';

    protected $fillable = ['id','title','candidate_id','status','view','edit','delete','vacancy_id','description','skill','vacancy_type','link_to_file'];

    public function getTask()
    {
        return $this->belongsTo('App\Models\TestTaskResult');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\VacancyCategory');
    }

    public function vacancy()
    {
        return $this->belongsTo('App\Models\Vacancy');
    }
}
