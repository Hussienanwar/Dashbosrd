<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProudectRequest extends FormRequest
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
        'name'        => 'required|string |min:3| max:20|regex:/^[\pL\s\-]+$/u',
        'price'       => 'required|integer',
        'description'       => 'nullable|max:30',
        'image'       => 'image',
        'category_id'       => 'required',
        ]; 
    }

    public function messages(): array
    {
        return [
        'name.required' => 'Please enter the product name',
        'name.string'   => 'The product name must be a valid string',
        'name.min'      => 'The product name must be at least 3 characters',
        'name.max'      => 'The product name must not exceed 20 characters',
        'name.regex'    => 'The product name can only contain letters, spaces, and hyphens',
        'price.required'    => 'Please enter the product price',
        'price.integer'     => 'The price must be an integer ',
        'description.max'   => 'The description must not exceed 30 characters'
        ]; 
    }


}
