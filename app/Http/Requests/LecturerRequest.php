<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LecturerRequest extends FormRequest
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
            'fullname' => 'required |string',
            'address' => 'required |string',
            'mobileno' => 'required|numeric| unique:lecturers',
            'dob' => 'required | date',
            'department' => 'required |string',
            'description' => 'required |string| max:255',
            'img' => 'required|image',
            'gender' => 'required |string',
            'country'=> 'required |string',
            'state' => 'required |string',
        ];
    }
}
