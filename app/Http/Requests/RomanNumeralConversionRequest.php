<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RomanNumeralConversionRequest extends FormRequest
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
            'integer' => 'required|integer|between:1,3999',
        ];
    }

    public $validator = null;

    protected function failedValidation($validator)
    {
        abort(400, "ERROR: Invalid or missing 'integer'.");
    }
}