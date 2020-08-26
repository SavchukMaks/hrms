<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateOffer extends Model
{
    protected $table = 'candidate_offers';


    protected $fillable = ['id','candidate_id','offer_id','vacancy_id','sent'];

    public function offer()
    {
        return $this->belongsTo('App\Models\Offer');
    }
}
