<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotosRequest extends FormRequest
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
            'photos.*' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'photos.*.required' => 'At least one photo is required.',
            'photos.*.image' => 'Only image files are allowed.',
            'photos.*.mimes' => 'Only JPG, JPEG, PNG, GIF or WEBP are allowed.',
            'photos.*.max' => 'Each image must be max 2MB.'
        ];
    }
}
