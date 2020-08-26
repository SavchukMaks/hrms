<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{

    protected $table = 'balances';

    protected $fillable = ['user_profile_id', 'sum'];

    public function userProfile()
    {
        return $this->belongsTo('App\Models\UserProfile');
    }

}