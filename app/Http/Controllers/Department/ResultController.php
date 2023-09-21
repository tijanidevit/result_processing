<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Http\Requests\Department\Result\UploadResultRequest;
use App\Models\DepartmentCourse;
use App\Services\ResultService;
use Exception;

class ResultController extends Controller
{
    public function __construct(protected ResultService $resultService) {}


    public function show(int $departmentCourseId) {
        $resultData = $this->resultService->getDepartmentCourseResult($departmentCourseId);
        $departmentCourse = $resultData['departmentCourse'];
        $resultAnalysis = $resultData['resultAnalysis'];
        return view('department.result.show',compact('departmentCourse','resultAnalysis'));
    }
}
