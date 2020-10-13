<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MonitoringRequest extends FormRequest
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
            'mon_day' => [ 'required',
                            Rule::unique('monitoring_data')->where(function ($query) use ($request) {
                            return $query
                            ->where('participant_id', $this->route('id'))
                            ->where('mon_day', $request['mon_day']);
                        })],
            'mon_date' => ['required',
                            'max:10',
                            Rule::unique('monitoring_data')->where(function ($query) use ($request) {
                                return $query
                                ->where('participant_id', $this->route('id'))
                                ->where('mon_date', $request['mon_date']);
                            })
                        ],
        ];
    }
}
