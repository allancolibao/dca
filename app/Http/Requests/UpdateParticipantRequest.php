<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParticipantRequest extends FormRequest
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
            'full_name' => 'required',
            'sex' => 'required',
            'csc' => 'required',
            'birth_date' => 'required',
            'age' => 'required',
            'educ_attainment' => 'required',
            'occupation' => 'required',
            'home_address' => 'required',
            'contact' => 'required'
        ];
    }
}
