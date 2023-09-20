<?php
namespace App\Services\Department;

use App\Jobs\UploadCoursesJob;
use App\Models\DepartmentCourse;
use App\Utils\DepartmentUtil;
use Illuminate\Support\Facades\DB;

class CourseService {

    public function __construct(protected DepartmentCourse $course) {
    }

    public function getAll() {
        return $this->course
        ->with('level')
        ->with('lecturerCourse.user')
        ->with('semester')
        ->whereDepartmentId(DepartmentUtil::getDepartmentId(auth()->user()))
        ->get();
    }
    public function addNew($data) {
        return DB::transaction(function () use ($data) {
            $data['department_id'] = DepartmentUtil::getDepartmentId(auth()->user());
            $lecturer_id = $data['lecturer_id'];
            unset($data['lecturer_id']);
            $departmentCourse = $this->course->create($data);
            $departmentCourse->lecturerCourse()->create([
                'user_id' => $lecturer_id
            ]);
            return $departmentCourse;
        });
    }

}
