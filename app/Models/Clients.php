<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'users';

    protected $fillable = ['email','password','role'];

    protected $hidden = ['password', 'remember_token'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function userProfile()
    {
        return $this->belongsToMany('App\Models\UserProfile');
    }
}
