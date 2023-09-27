<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Course\AddCourseRequest;
use App\Services\Admin\CourseService;

class CourseController extends Controller
{
    public function __construct(protected CourseService $courseService ) {}

    public function index() {
        $courses = $this->courseService->getAll();
        return view('admin.course.index', compact('courses'));
    }

    public function create() {
        return view('admin.course.create');
    }

    public function store(AddCourseRequest $request) {
        $schools = $this->courseService->addNew($request->validated());

        return redirect()->back()->with('success','Course successfully added!');
    }
}
