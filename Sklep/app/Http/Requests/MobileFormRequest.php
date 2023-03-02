<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileFormRequest extends FormRequest
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
            'ram_size' => [
                'required',
                'integer'
            ],
            'memory_size' => [
                'required',
                'integer'
            ],
            'display_size' => [
                'required',
                'numeric'
            ],
        ];
    }
}
