<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WritingLanguage extends Model
{
     /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'writing_languages';
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
}
