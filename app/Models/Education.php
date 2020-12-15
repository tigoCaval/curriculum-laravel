<?php

namespace App\Models;

use App\Domain\Traits\EducationTrait;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{

    use EducationTrait; 

    /**
     * Table SQL
     * @var string
     */
    protected $table = "educations";

     /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['education_course_id', 'user_id'];

    /**
     * Get the education that contains the education courses.
     * Obter a escolaridade que contém a escolaridade cursos.
     * @return [type]
     */
    public function educationCourse()
    {
       return $this->belongsTo('App\Models\EducationCourse');
    }
}
