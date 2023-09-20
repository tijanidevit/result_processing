<?php

namespace App\Services;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentService {
    public function __construct(protected Student $student) {
    }

    public function getDepartmentLevelStudent($departmentId, $levelId) : Collection {
        return Student::where([
            'department_id' => $departmentId,
            'level_id' => $levelId,
        ])->oldest('matric_no')->select('matric_no')->get();
    }
}
