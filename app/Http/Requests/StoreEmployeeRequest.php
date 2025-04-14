<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CpfValido;

class StoreEmployeeRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'cpf' => ['required','digits:11','unique:employees,cpf',new CpfValido],
            'gender' => 'nullable|string',
            'ethnicity' => 'nullable|string',
            'date_of_birth' => 'nullable|date',
            'about_me' => 'nullable|string',
            'id_birthplace' => 'required|integer',
            'id_workplace' => 'required|integer',
            'id_profession' => 'required|integer'
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'First name cannot be null.',
            'name.max' => 'First name field cannot contain more than 255 characters.',
            'surname.required' => 'Last name cannot be null.',
            'surname.max' => 'Last name field cannot contain more than 255 characters.',
            'cpf.required' => 'CPF cannot be null.',
            'cpf.digits' => 'CPF must have exactly 11 digits.',
            'cpf.unique' => 'This CPF is already registered.',
            'id_birthplace.required' => 'Birthplace field cannot be null.',
            'id_workplace.required' => 'Workplace field cannot be null.',
            'id_profession.required' => 'Profession field cannot be null.'
        ];
    }
}
