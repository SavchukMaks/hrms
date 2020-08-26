<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'Tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','title'];

    /**
     * Get tags
     *
     */

    public function tags()
    {
        return $this->belongsToMany('App\Models\Vacancy');
    }

    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }

}
