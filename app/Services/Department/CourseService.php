<?php
namespace App\Services\Department;

use App\Jobs\UploadCoursesJob;
use App\Models\DepartmentCourse;
use App\Utils\DepartmentUtil;

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
        return $this->course->create($data);
    }

}
