<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLocationRequest extends FormRequest
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
            'city' => 'required|string|max:199|unique:locations,city',
            'state' => 'required',
            'ddd' => 'nullable|integer',
            'region' => 'required|string'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'city.required' => 'City name cannot be null!',
            'city.max' => 'City name exceeded the character limit!',
            'city.unique' => 'City already exists in the system.',
            'state.required' => 'State cannot be null!',
            'region.required' => 'Region cannot be null!'
        ];
    }
}
