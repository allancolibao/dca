<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticipantRequest extends FormRequest
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
            'participant_id' => 'required|unique:participants',
            'full_name' => 'required',
            'sex' => 'required',
            'csc' => 'required',
            'birth_date' => 'required|max:10',
            'age' => 'required',
            'educ_attainment' => 'required',
            'occupation' => 'required',
            'home_address' => 'required',
            'contact' => 'required|numeric|digits:11'
        ];
        
    }
    
}