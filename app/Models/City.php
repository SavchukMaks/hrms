<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['title','country_id'];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

}