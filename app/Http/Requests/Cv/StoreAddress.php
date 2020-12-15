<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddress extends FormRequest
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
            'country' => 'required|max:150', 
            'city' => 'required|max:150', 
            'uf' => 'required|max:150', 
            'address' => 'required|max:150',
            'neighborhood' => 'required|max:150', 
            'postal_code' => 'required|max:10',
        ];

    }

   
}
