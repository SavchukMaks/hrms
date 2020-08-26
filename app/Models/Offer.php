<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['id','title','vacancy_id','description'];

    public function VacancyOffers()
    {
        return $this->belongsTo('App\Models\Vacancy');
    }

    public function CandidateOffer()
    {
        return $this->hasOne('App\Models\CandidateOffer');
    }

}
