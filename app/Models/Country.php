<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = ['id','title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

}