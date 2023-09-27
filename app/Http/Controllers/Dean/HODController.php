<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dean\HOD\AddHodRequest;
use App\Services\Dean\DepartmentService;
use App\Services\Dean\HODService;

class HODController extends Controller
{
    public function __construct(protected HODService $hodService, protected DepartmentService $departmentService) {}

    public function index() {
        $hods = $this->hodService->getAll();
        return view('dean.hod.index', compact('hods'));
    }

    public function create() {
        $departments = $this->departmentService->getAll();
        return view('dean.hod.create', compact('departments'));
    }

    public function store(AddHODRequest $request) {
        $this->hodService->addNew($request->validated());

        return redirect()->back()->with('success','HOD successfully added!');
    }
}
