<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarrifs extends Model
{
    protected $table = 'tarrifs';

    protected $fillable = ['id','title','description','settings'];

    public function TarrifsPayments()
    {
        return $this->hasMany('App\Models\Payments');
    }
}
