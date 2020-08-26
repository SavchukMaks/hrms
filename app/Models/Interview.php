<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{

    public function vacancy()
    {
        return $this->belongsTo('App\Models\Vacancy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function candidate()
    {
        return $this->hasOne('App\Models\Candidate', 'id', 'candidate_id');
    }
}
