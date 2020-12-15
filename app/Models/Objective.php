<?php

namespace App\Models;

use App\Domain\Traits\ObjectiveTrait;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use ObjectiveTrait; 
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
    */
    protected $fillable = ['description', 'user_id'];    

}
