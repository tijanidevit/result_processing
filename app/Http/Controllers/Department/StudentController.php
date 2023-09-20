<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\Student\AddStudentRequest;
use App\Services\Department\StudentService;
use App\Services\LevelService;
use App\Services\SessionService;

class StudentController extends Controller
{
    public function __construct(protected StudentService $studentService, protected SessionService $sessionService, protected LevelService $levelService) {}

    public function index() {
        $students = $this->studentService->getAll();
        return view('department.student.index', compact('students'));
    }

    public function create() {
        $sessions = $this->sessionService->getAll();
        $levels = $this->levelService->getAll();
        return view('department.student.create', compact('sessions', 'levels'));
    }

    public function store(AddStudentRequest $request) {
        $this->studentService->addNew($request->validated());

        return redirect()->back()->with('success','Student successfully added!');
    }
}
