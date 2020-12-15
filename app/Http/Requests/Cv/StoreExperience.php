<?php

namespace App\Http\Requests\Cv;

use Illuminate\Foundation\Http\FormRequest;

class StoreExperience extends FormRequest
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
            'company'=>'required|max:200',
            'location'=>'required|max:200',
            'job_title'=>'required|max:200',
            'description'=>'nullable|max:255',
            'start'=>'required|date',
            'end'=>'required|date|after_or_equal:start',   
        ];
    }
}
