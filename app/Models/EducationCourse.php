<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationCourse extends Model
{
     /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'education_courses';

     /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
}
