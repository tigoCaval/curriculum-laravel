<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
                'course_type' => 'required|exists:course_types,id', 
                'course_name' => 'required', 
                'institution' => 'required', 
                'country' => 'required', 
                'uf' => 'required', 
                'city' => 'required', 
                'start' => 'required|date', 
                'end' => 'required|date|after_or_equal:start',  
                'course_status' => 'required|exists:course_statuses,id', 
        ];
    }
}
