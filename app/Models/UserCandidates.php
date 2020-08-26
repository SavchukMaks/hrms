<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCandidates extends Model
{
    protected $table = 'user_candidates';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','user_id','candidate_id'];


    public function CompanyCandidateUsers()
    {
        return $this->hasMany('App\Models\Company');
    }
}
