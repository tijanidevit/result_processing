<?php

namespace App\Http\Requests\Admin\Dean;

use Illuminate\Foundation\Http\FormRequest;

class AddDepartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isDean();
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
            'school_id' => 'required|exists:schools,id'
        ];
    }

    public function messages() : array {
        return [
            'email.users' => 'A dean with this email address already added',
        ];
    }
}
