<?php

namespace App\Imports\Student;

use App\Models\Student;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithUpserts;

class UploadStudentsImport implements ToModel, WithUpserts
{
    public function __construct(protected int $departmentId,protected int $levelId,protected int $sessionId) {
    }
    public function model(array $row)
    {
        Log::info(json_encode($row));
        return new Student([
            'name' => $row[0],
            'matric_no' => $row[1],
            'department_id' => $this->departmentId,
            'level_id' => $this->levelId,
            'session_id' => $this->sessionId,
        ]);
    }

    public function uniqueBy()
    {
        return 'matric_no';
    }
}


?>
