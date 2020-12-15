<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'course_types'; 
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
}
