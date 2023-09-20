<?php
namespace App\Services\Department;

use App\Jobs\UploadStudentsJob;
use App\Models\Student;
use App\Utils\DepartmentUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentService {

    public function __construct(protected Student $student) {
    }

    public function getAll() {
        return $this->student->oldest('name')
        ->with('level')
        ->whereDepartmentId(DepartmentUtil::getDepartmentId(auth()->user()))
        ->get();
    }
    public function addNew($data) {
        $departmentId = DepartmentUtil::getDepartmentId(auth()->user());

        $file = $data['csv_file'];
        $filePath = $file->storeAs('uploads', 'imported_users.csv', 'public');

        // $filePath = $this->uploadCsv('students', $file);

        dispatch(new UploadStudentsJob($filePath, $departmentId, $data['level_id'], $data['session_id']));
    }

}
