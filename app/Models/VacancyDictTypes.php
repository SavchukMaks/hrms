<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyDictTypes extends Model
{

    protected $table = 'vacancy_dict_types';

    protected $hidden = [
        'created_at', 'updated_at',
    ];


    protected $fillable = ['vacancy_id', 'dict_type_id'];


}