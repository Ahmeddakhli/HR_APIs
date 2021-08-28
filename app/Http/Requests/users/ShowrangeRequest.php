<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class ShowrangeRequest extends FormRequest
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
            'startdate' => 'required|date|date_format:Y-m-d',
            'enddate' =>'required|date|date_format:Y-m-d',
          
        ];
    }
}
