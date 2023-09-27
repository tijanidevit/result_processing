<?php

namespace App\Http\Requests\Dean\Hod;

use Illuminate\Foundation\Http\FormRequest;

class AddHodRequest extends FormRequest
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
            'department_id' => 'required|exists:departments,id',
            'email' => 'required|string|unique:users',
            'name' => 'required|string',
        ];
    }
}
