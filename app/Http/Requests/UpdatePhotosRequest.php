<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePhotosRequest extends FormRequest
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
            'new_photos.*' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'new_photos.*.image' => 'Only image files are allowed.',
            'new_photos.*.mimes' => 'Only JPG, JPEG, PNG, GIF or WEBP are allowed.',
            'new_photos.*.max' => 'Each image must be max 2MB.'
        ];
    }
}
