<?php

namespace App\Http\Requests\users;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttendRequest extends FormRequest
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
               
        'day' =>' required|date|date_format:Y-m-d',
        'working_hours'=>' required|numeric|max:8|min:0',
        'attendanceable_id'=>' required|numeric',
        'status_id'=>' required|numeric'
        ];
    }
}
