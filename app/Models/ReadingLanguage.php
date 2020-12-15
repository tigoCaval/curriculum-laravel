<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingLanguage extends Model
{
     /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'reading_languages';
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
}
