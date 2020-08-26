<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function userProfile()
    {
        return $this->hasOne('App\Models\UserProfile','user_id');
    }

    public function userCompanies()
    {
        return $this->belongsToMany('App\Models\Company');
    }

    public function payments()
    {
        return $this->hasMany('App\Models\Payments');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return User::where('role', $role)->get();
    }

    public function clients()
    {
        return $this->hasOne('App\Models\Clients');
    }

    public function assign($role)
    {
        if(is_string($role))
        {
            return $this->roles()->save(

                Role::whereName($role)->firstOrFail()

            );
        }
       return $this->roles()->save($role);
    }

    /**
    * @return bool
    */
    public function isCustomer()
    {
        return $this->checkRole('Customer');
    }

    public function checkRole($roleName)
    {
        if($this->role == $roleName) {
            return true;
        }else{
            return false;
        }
    }

    public function vacancys()
    {
        return $this->belongsToMany('App\Models\Vacancy', 'vacancys_customers', 'customer_id', 'vacancy_id');
    }

}
