<?php
namespace App\Services\Lecturer;

use App\Models\Course;

class CourseService {

    public function __construct(protected Course $course) {
    }

    public function getAll() {
        return auth()->user()->lecturerCourses()->with(['departmentCourse.course','departmentCourse.level','departmentCourse.semester'])->get();
    }

    public function getCoursesThatHaveResult() {
        return auth()->user()->lecturerCourses()->whereHas('departmentCourse', function ($query) {
            $query->whereHas('result');
        })->with(['departmentCourse.course'])->get();
        // return auth()->user()->lecturerCourses()->with(['departmentCourse' => function ($query) {
        //     $query->whereHas('result');
        // }])->get();
    }

}
