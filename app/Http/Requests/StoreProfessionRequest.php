<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfessionRequest extends FormRequest
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
            'profession_name' => 'required|string|max:199|unique:professions,profession_name',
            'salary' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'id_course' => 'required|integer'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'profession_name.required' => 'Profession name cannot be null!',
            'profession_name.max' => 'Profession name exceeded the character limit!',
            'profession_name.unique' => 'The profession already exists in the system!',
            'salary.required' => 'Salary cannot be null!',
            'salary.regex' => 'The salary cannot contain letters or any other types of special characters!',
            'id_course.required' => 'Course ID cannot be null!'
        ];
    }
}
