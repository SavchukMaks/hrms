<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestTaskResult extends Model
{
    protected $table = 'test_task_results';

    protected $fillable = ['id','candidate_id','vacancy_id','content'];

    public function getTaskResult()
    {
        return $this->hasOne('App\Models\Task');
    }
}
