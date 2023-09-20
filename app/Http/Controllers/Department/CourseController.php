<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\Course\AddCourseRequest;
use App\Services\Department\CourseService;
use App\Services\LevelService;
use App\Services\SemesterService;
use App\Services\UserService;
use App\Services\CourseService as GeneralCourseService;

class CourseController extends Controller
{
    public function __construct(
        protected CourseService $courseService,
        protected SemesterService $semesterService,
        protected LevelService $levelService,
        protected UserService $userService,
        protected GeneralCourseService $generalCourseService) {}

    public function index() {
        $courses = $this->courseService->getAll();
        return view('department.course.index', compact('courses'));
    }

    public function create() {
        $semesters = $this->semesterService->getAll();
        $levels = $this->levelService->getAll();
        $lecturers = $this->userService->getLecturers();
        $courses = $this->generalCourseService->getAll();
        return view('department.course.create', compact('semesters', 'levels', 'lecturers', 'courses'));
    }

    public function store(AddCourseRequest $request) {
        $this->courseService->addNew($request->validated());

        return redirect()->back()->with('success','Course successfully added!');
    }
}
