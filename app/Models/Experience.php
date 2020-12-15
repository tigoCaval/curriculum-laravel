<?php

namespace App\Models;

use App\Domain\Traits\ExperienceTrait;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
 
    use ExperienceTrait;
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array 
     */
    protected $fillable = ['company','location','job_title','description','start','end','user_id'];


}
