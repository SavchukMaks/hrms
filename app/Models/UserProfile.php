<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'firstname', 'lastname', 'birth_date', 'work_email', 'description', 'location_id', 'balance_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function balance()
    {
        return $this->hasOne('App\Models\Balance');
    }

    public function clients()
    {
        return $this->hasMany('App\Models\Clients');
    }

}
