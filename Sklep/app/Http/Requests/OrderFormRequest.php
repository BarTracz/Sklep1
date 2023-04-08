<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderFormRequest extends FormRequest
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
            'firstname' => [
                'required',
                'string',
                'max:50'
            ],
            'lastname' => [
                'required',
                'string',
                'max:50'
            ],
            'phone' => [
                'required',
                'numeric'
            ],
            'zipcode' => [
                'required',
                'string',
                'max:20'
            ],
            'city' => [
                'required',
                'string',
                'max:30'
            ],
            'street' => [
                'required',
                'string',
                'max:30'
            ],
            'house' => [
                'required',
                'string',
                'max:10',
                'numeric',
            ],
        ];
    }
}
