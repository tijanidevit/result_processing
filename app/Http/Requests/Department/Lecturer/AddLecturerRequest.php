<?php

namespace App\Http\Requests\Department\Lecturer;

use Illuminate\Foundation\Http\FormRequest;

class AddLecturerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isDepartment();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ];
    }

    public function messages() : array {
        return [
            'email.users' => 'A user with this email address already added',
        ];
    }
}
