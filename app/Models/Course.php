<?php

namespace App\Models;

use App\Domain\Traits\CourseTrait;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use CourseTrait; 
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'institution', 'country', 'uf', 'city', 'start', 'end', 
        'course_status_id', 'course_type_id', 'user_id',
    ];

     /**
     * Get the course that contains the course status.
     * Obter os curso que contém o curso status.
     * @return [type]
     */
    public function courseStatus()
    {
        return $this->BelongsTo('App\Models\CourseStatus'); 
    } 

     /**
     * Get the course that contains the course type.
     * Obter os curso que contém o tipo do curso.
     * @return [type]
     */
    public function courseType()
    {
        return $this->BelongsTo('App\Models\CourseType'); 
    } 
    
}
