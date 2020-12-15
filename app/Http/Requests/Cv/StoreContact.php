<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreContact extends FormRequest
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
            'phone'=> 'required|digits_between:10,14|numeric', 
            'phone_message'=> 'nullable|digits_between:10,14|numeric',
            'email'=> 'nullable|email',  
        ];
    }
}
