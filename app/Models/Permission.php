<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 15.09.17
 * Time: 12:48
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['name','label'];

    /**
     * Get tags
     *
     */

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}