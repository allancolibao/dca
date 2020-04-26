<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecordDateRequest extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            'record_date' => [ 'required',
                               'max:10',
                               Rule::unique('record_headers')->where(function ($query) use ($request) {
                               return $query
                               ->where('participant_id', $this->route('id'))
                               ->where('record_date', $request['record_date']);
                            })
            ]
        ];
    }
}
