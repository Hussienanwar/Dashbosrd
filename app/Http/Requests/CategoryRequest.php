<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name'        => 'required|string |min:3| max:20|regex:/^[\pL\s\-]+$/u'
        ];
    }
    public function messages(): array
    {
        return   [
        'name.required' => 'Please enter the Category name',
        'name.string'   => 'The Category name must be a valid string',
        'name.min'      => 'The Category name must be at least 3 characters',
        'name.max'      => 'The Category name must not exceed 20 characters',
        'name.regex'    => 'The Category name can only contain letters, spaces, and hyphens'
        ];
    }


}
