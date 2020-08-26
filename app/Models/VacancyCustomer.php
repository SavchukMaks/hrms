<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VacancyCustomer extends Model
{
    protected $table = 'vacancys_customers';

    protected $hidden = [
        'created_at', 'updated_at',
    ];


    protected $fillable = ['vacancy_id', 'customer_id'];

}