<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateFile extends Model
{

    protected $fillable = ['file_name','file_url', 'candidate_id', 'file_type', 'file_path'];

    public function candidate()
    {
        return $this->belongsTo('App\Models\Candidate');
    }

}
