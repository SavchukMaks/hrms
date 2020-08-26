<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

     protected $table = 'companies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','title','owner_user_id','company_id'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public $timestamps = false;

    public function CompanyUsers()
    {
       return $this->hasMany('App\Models\CompanyUsers');


    }
    public function userProfile()
    {
        return $this->hasMany('App\Models\User');
    }

    public function CompanyCandidate()
    {
        return $this->belongsTo('App\Models\UserCandidates');
    }
}
