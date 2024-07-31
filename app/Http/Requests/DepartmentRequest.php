<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'deptname'=>'required|string|min:2',
            'hod'=>'required|string',
            'email'=>'required|email |unique:departments',
            'no_courses'=>'required|numeric',
            'status'=>'required|string',
            'no_students'=>'required|numeric'
        ];
    }
}
