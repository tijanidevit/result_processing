<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dean\Department\AddDepartmentRequest;
use App\Services\Dean\DepartmentService;

class DepartmentController extends Controller
{
    public function __construct(protected DepartmentService $departmentService) {}

    public function index() {
        $departments = $this->departmentService->getAll();
        return view('dean.department.index', compact('departments'));
    }

    public function create() {
        $departments = $this->departmentService->getAll();
        return view('dean.Department.create', compact('departments'));
    }

    public function store(AddDepartmentRequest $request) {
        $departments = $this->DepartmentService->addNew($request->validated());

        return redirect()->back()->with('success','Department successfully added!');
    }
}
