<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreLanguage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    { 
        return [
            'language'=>'required', 
            'reading_language'=>'required|exists:reading_languages,id', 
            'writing_language'=>'required|exists:writing_languages,id', 
            'speak_language'=>'required|exists:speak_languages,id' 
        ];
    }
}
