<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            return[
                'name' => [
                    'required',
                    'string'
                ],
                'description' => [
                    'required',
                    'string'
                ],
                'price' => [
                    'required',
                    'numeric'
                ],
                'quantity' => [
                    'required',
                    'integer'
                ],
                'brand_id' => [
                    'required',
                    'integer'
                ],
                'image' => [
                    'nullable',
                ],
                'os' => [
                    'nullable',
                    'string'
                ],
                'cpu' => [
                    'nullable',
                    'string'
                ],
                'gpu' => [
                    'nullable',
                    'string'
                ],
                'ram_type' => [
                    'nullable',
                    'string'
                ],
                'ram_size' => [
                    'nullable',
                    'integer'
                ],
                'disk1_type' => [
                    'nullable',
                    'string'
                ],
                'disk1_size' => [
                    'nullable',
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
                'display_size' => [
                    'nullable',
                    'numeric'
                ],
                'connection_type' => [
                    'nullable',
                    'string'
                ],
                'memory_size' => [
                    'nullable',
                    'integer'
                ],
                'type' => [
                    'nullable',
                    'string'
                ],
                'disk_size' => [
                    'nullable',
                    'integer'
                ],
                'controller_number' => [
                    'nullable',
                    'integer'
                ],
            ];
    }
}
