<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyCategory extends Model
{
    protected $table = 'VacancyCategories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','title'];

    public $timestamps = false;

    /**
     * Get vacancy
     *
     */

    public function vacancy()
    {
        return $this->hasOne('App\Models\Vacancy');
    }

    public function task()
    {
        return $this->hasOne('App\Models\Task');
    }

}
