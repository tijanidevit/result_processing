<?php

namespace App\Http\Requests\Lecturer\Result;

use Illuminate\Foundation\Http\FormRequest;

class UploadResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->isLecturer();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'csv_file' => 'required|file|mimes:csv',
            'department_course_id' => 'required|exists:department_courses,id'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'department_course_id' => $this->departmentCourseId,
        ]);
    }

    public function messages() : array {
        return [
            'email.users' => 'A dean with this email address already added',
        ];
    }
}
