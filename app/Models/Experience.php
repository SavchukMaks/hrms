<?php
/**
 * Created by PhpStorm.
 * User: fyshtey
 * Date: 20.02.18
 * Time: 15:28
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{

    protected $table = 'experience';

    public $timestamps = false;

    public function candidate(){
        return $this->belongsTo('App\Models\Candidate');
    }

}