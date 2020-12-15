<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpeakLanguage extends Model
{
     /**
     * Table SQL
     * 
     * @var string
     */
    protected $table = 'speak_languages';
    
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description'];
}
