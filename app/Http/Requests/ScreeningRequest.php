<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScreeningRequest extends FormRequest
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
            'participant_id' => 'unique:screenings',
            'date_accomplished' => 'max:10',
            'phone_number' => 'nullable|numeric|digits:11',
            'sec_02_02' => 'max:10',
            'physician_date' => 'max:10',
            'is_eligible' => 'required'
        ];
    }
}
