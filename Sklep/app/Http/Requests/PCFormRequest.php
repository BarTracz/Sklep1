<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PCFormRequest extends FormRequest
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
            'cpu' => [
                'required',
                'string'
            ],
            'gpu' => [
                'required',
                'string'
            ],
            'ram_type' => [
                'required',
                'string'
            ],
            'ram_size' => [
                'required',
                'integer'
            ],
            'disk1_type' => [
                'required',
                'string'
            ],
            'disk1_size' => [
                'required',
                'integer'
            ],
            'disk2_type' => [
                'nullable',
                'string'
            ],
            'disk2_size' => [
                'nullable',
                'integer'
            ],
        ];
    }
}
