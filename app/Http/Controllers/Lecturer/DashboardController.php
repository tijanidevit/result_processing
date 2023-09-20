<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Services\Lecturer\CourseService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(protected CourseService $courseService) {
    }

    public function index() {
        $courses = $this->courseService->getAll();
        return view('lecturer.dashboard', compact('courses'));
    }
}
