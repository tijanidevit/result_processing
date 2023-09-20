<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Lecturer\Result\UploadResultRequest;
use App\Models\DepartmentCourse;
use App\Models\Student;
use App\Services\Lecturer\CourseService;
use App\Services\Lecturer\ResultService;
use Exception;

class ResultController extends Controller
{
    public function __construct(protected ResultService $resultService, protected CourseService $courseService) {}


    public function create(DepartmentCourse $departmentCourse) {
        $departmentCourse->load('course','department');

        return view('lecturer.result.create',compact('departmentCourse'));
    }

    public function show(int $departmentCourseId) {
        $resultData = $this->resultService->getDepartmentCourseResult($departmentCourseId);
        $departmentCourse = $resultData['departmentCourse'];
        $resultAnalysis = $resultData['resultAnalysis'];
        return view('lecturer.result.show',compact('departmentCourse','resultAnalysis'));
    }

    public function upload(UploadResultRequest $request) {
        try {
            $this->resultService->upload($request->validated());
            return back()->with('success', 'Result successfully uploaded');
        } catch (Exception $ex) {
            return back()->with('error', $ex->getMessage());
        }
    }
}
