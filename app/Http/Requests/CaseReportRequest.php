<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaseReportRequest extends FormRequest
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
            'date_admitted' => 'required|max:10',
            'date_accomplished' => 'max:10',
            'phone_number' => 'nullable|numeric|digits:11',
            'sec_02_anthrop_01' => 'max:10',
            'sec_02_anthrop_02' => 'max:10',
            'sec_02_anthrop_03' => 'max:10',
            'sec_02_dia_01' => 'max:10',
            'sec_02_dia_02' => 'max:10',
            'sec_02_dia_03' => 'max:10',
            'sec_02_lipid_01' => 'max:10',
            'sec_02_lipid_02' => 'max:10',
            'sec_02_lipid_03' => 'max:10',
            'sec_02_liver_01' => 'max:10',
            'sec_02_liver_02' => 'max:10',
            'sec_02_liver_03' => 'max:10',
            'sec_02_cli_01' => 'max:10',
            'sec_02_cli_02' => 'max:10',
            'sec_02_cli_03' => 'max:10',
            'sec_02_sign_01' => 'max:10',
            'sec_02_sign_02' => 'max:10',
            'sec_02_sign_03' => 'max:10',
        ];
    }
}
