<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\Lecturer\AddLecturerRequest;
use App\Services\Department\LecturerService;

class LecturerController extends Controller
{
    public function __construct(protected LecturerService $lecturerService) {}

    public function index() {
        $lecturers = $this->lecturerService->getAll();
        return view('department.lecturer.index', compact('lecturers'));
    }

    public function create() {
        return view('department.Lecturer.create');
    }

    public function store(AddLecturerRequest $request) {
        $this->lecturerService->addNew($request->validated());

        return redirect()->back()->with('success','Lecturer successfully added!');
    }
}
