<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table = 'payments';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    *
    */

    protected $fillable = ['id','title','user_id','status','transaction_id','description'];

    public function UserPayments()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function Tarrifs()
    {
        return $this->belongsTo('App\Models\Tarrifs');
    }
}
