<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['city_id','country_id'];

    public function vacancys()
    {
        return $this->belongsToMany('App\Models\Vacancy');
    }

    public function candidates()
    {
        return $this->hasMany('App\Models\Candidate');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function userProfiles()
    {
        return $this->hasMany('App\Models\UserProfile');
    }


}
