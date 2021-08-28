<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
           
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:employees,email',
            'mobile_no' => 'required|numeric|max:01999999999',
            'hiredate' => 'required|date|date_format:"Y/m/d"'
        ];
    }
}
