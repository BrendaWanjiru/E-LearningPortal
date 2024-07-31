<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'csname' => 'required| string',
            'cscode' => 'required | string',
            'status' => 'required| string',
            'description' => 'required| string',
            'level' => 'required| string',
            'deptid' => 'required| numeric',
            'lectid'=> 'required| numeric',
            'url'=> 'required| string'
        ];
    }
}
