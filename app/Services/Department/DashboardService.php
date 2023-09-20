<?php


namespace App\Services\Department;

use App\Models\Student;
use App\Models\Department;
use App\Models\DepartmentCourse;
use App\Models\DepartmentCourseResult;
use App\Models\User;

class DashboardService {
    public function __construct(protected Student $student,protected DepartmentCourse $departmentCourse,protected User $user,protected DepartmentCourseResult $departmentCourseResult) {}

    public function getDashboardData() : array {
        $departmentId = auth()->user()->departmentHod->department_id;

        $totalStudents = $this->student->whereDepartmentId($departmentId)->count();
        $totalCourses = $this->departmentCourse->whereDepartmentId($departmentId)->count();

        $totalLecturers = $this->user->lecturerOnly()
            ->whereHas('departmentLecturer', function ($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })->count();

        $totalResults = $this->departmentCourseResult
            ->whereHas('departmentCourse', function ($query) use ($departmentId) {
                $query->where('department_id', $departmentId);
            })->count();

        return compact('totalCourses', 'totalStudents', 'totalLecturers', 'totalResults');
    }
}
