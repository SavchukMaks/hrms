<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 21.11.17
 * Time: 13:21
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Status_Candidate extends Model
{
    protected $table = 'status_candidate';

    protected $fillable = ['id', 'status'];

    protected $hidden = ['created_at', 'updated_at'];

    public function Candidate()
    {
        return $this->hasMany('App\Models\Candidate','id');
    }
}