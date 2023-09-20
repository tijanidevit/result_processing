<?php


namespace App\Services\Dean;

use App\Models\Student;
use App\Models\Department;
use App\Models\Result;
use App\Models\User;

class DashboardService {
    public function __construct(protected Student $student,protected Department $department,protected User $user,protected Result $result) {}

    public function getDashboardData() : array {
        $totalStudents = $this->student->count();
        $totalDeans = $this->user->deanOnly()->count();
        $totalLecturers = $this->user->lecturerOnly()->count();
        $totalDepartments = $this->department->count();

        return compact('totalDeans', 'totalStudents', 'totalLecturers', 'totalDepartments');
    }
}
