<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 15.09.17
 * Time: 9:48
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
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

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public  function  assign(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

}