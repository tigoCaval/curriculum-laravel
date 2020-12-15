<?php

namespace App\Models;

use App\Domain\Traits\LanguageTrait;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{   

    use LanguageTrait; 
    /**
     * The attributes that are mass assignable.
     * 
     * @var array
     */
    protected $fillable = ['description', 'reading_language_id', 'writing_language_id', 'speak_language_id', 'user_id']; 

     /**
     * Get the language that contains the reading_language.
     * Obter o idioma que contém o nivel de leitura.
     * @return [type]
     */
    public function readingLanguage()
    {
       return $this->belongsTo('App\Models\ReadingLanguage');
    }

      /**
     * Get the language that contains the writing_language.
     * Obter o idioma que contém o nivel da escrita.
     * @return [type]
     */
    public function writingLanguage()
    {
       return $this->belongsTo('App\Models\WritingLanguage');
    }

      /**
     * Get the language that contains the speak_language.
     * Obter o idioma que contém o nivel de conversação.
     * @return [type]
     */
    public function speakLanguage()
    {
       return $this->belongsTo('App\Models\SpeakLanguage');
    }

      /**
     * Get the language that contains the user.
     * Obter o idioma que contém o usuário.
     * @return [type]
     */
    public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
    
}
