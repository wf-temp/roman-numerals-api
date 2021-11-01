<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecentRomanNumeralConversionsRequest extends FormRequest
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
            'time_span_in_hours' => 'integer|between:1,168',
        ];
    }

    public $validator = null;

    protected function failedValidation($validator)
    {
        abort(400, "ERROR: Invalid 'time_span_in_hours'.");
    }

}
