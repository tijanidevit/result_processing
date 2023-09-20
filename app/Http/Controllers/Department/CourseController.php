<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\Course\AddCourseRequest;
use App\Services\Department\CourseService;
use App\Services\LevelService;
use App\Services\SessionService;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService, protected SessionService $sessionService, protected LevelService $levelService) {}

    public function index() {
        $courses = $this->courseService->getAll();
        return view('department.course.index', compact('courses'));
    }

    public function create() {
        $sessions = $this->sessionService->getAll();
        $levels = $this->levelService->getAll();
        return view('department.course.create', compact('sessions', 'levels'));
    }

    public function store(AddCourseRequest $request) {
        $this->courseService->addNew($request->validated());

        return redirect()->back()->with('success','Course successfully added!');
    }
}
