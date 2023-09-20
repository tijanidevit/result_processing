<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dean\AddDeanRequest;
use App\Services\Admin\DeanService;
use App\Services\Admin\SchoolService;

class DeanController extends Controller
{
    public function __construct(protected DeanService $deanService, protected SchoolService $schoolService) {}

    public function index() {
        $deans = $this->deanService->getAll();
        return view('admin.dean.index', compact('deans'));
    }

    public function create() {
        $schools = $this->schoolService->getAll();
        return view('admin.dean.create', compact('schools'));
    }

    public function store(AddDeanRequest $request) {
        $schools = $this->deanService->addNew($request->validated());

        return redirect()->back()->with('success','Dean successfully added!');
    }
}
