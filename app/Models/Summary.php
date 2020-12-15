<?php

namespace App\Models;

use App\Domain\Traits\SummaryTrait;
use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    
     use SummaryTrait;

    /**
    * The attributes that are mass assignable.
    * 
    * @var array
    */
    protected $fillable = ['description', 'user_id'];
     
}
