<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocument extends FormRequest
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
            'full_name'=> 'required', 
            'date_birth'=> 'required|date', 
            'nationality'=>'required', 
            'place_birth'=>'required', 
            'ssn'=>'nullable|digits_between:11,11|numeric', 
            'identity'=>'nullable|max:20', 
            'driver_license'=>'required',   
        ];
    }
}
