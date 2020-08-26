<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyUsers extends Model
{
    protected $table = 'companies';

    protected $fillable = ['id','company_id','user_id','add_permission','edit_permission','delete_permission','read_permission'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     */

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

}
