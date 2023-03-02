<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmartwatchFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'os' => [
                'required',
                'string'
            ],
            'connection_type' => [
                'required',
                'string'
            ],
            'display_size' => [
                'required',
                'numeric'
            ],
        ];
    }
}
