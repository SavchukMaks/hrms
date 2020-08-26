<?php
/**
 * Created by PhpStorm.
 * User: andriy
 * Date: 13.10.17
 * Time: 10:50
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class WelcomeMessage extends Model
{
    protected $table = 'welcome_message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [ 'id', 'name_of_message', 'type_of_vacancy', 'content_message'];

    /**
     * Get category
     *
     */

    public $timestamps = false;
}