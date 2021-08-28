<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class ShowmonthRequest extends FormRequest
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
            'employee_id' => 'required|numeric',
            'month' =>'required|numeric',
        ];
    }
}
