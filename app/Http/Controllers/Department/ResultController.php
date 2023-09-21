<?php

namespace App\Http\Controllers\Department;

use App\Http\Controllers\Controller;
use App\Services\LevelService;
use App\Services\ResultService;
use App\Services\SemesterService;
use App\Services\SessionService;
use App\Utils\DepartmentUtil;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct(
        protected ResultService $resultService,
        protected SessionService $sessionService,
        protected SemesterService $semesterService,
        protected LevelService $levelService,
    ) {}


    public function index() {
        $sessions = $this->sessionService->getAll();
        $semesters = $this->semesterService->getAll();
        $levels = $this->levelService->getAll();
        return view('department.result.analysis',compact('sessions','semesters','levels'));
    }
    public function show(int $departmentCourseId) {
        $resultData = $this->resultService->getDepartmentCourseResult($departmentCourseId);
        $departmentCourse = $resultData['departmentCourse'];
        $resultAnalysis = $resultData['resultAnalysis'];
        return view('department.result.show',compact('departmentCourse','resultAnalysis'));
    }

    public function getAnalysisForDepartment(Request $request) {
        $departmentId = DepartmentUtil::getDepartmentId(auth()->user());
        $studentResults = $this->resultService->getAnalysisForDepartment($request->session_id,$request->semester_id, $departmentId, $request->level_id);


        $sessions = $this->sessionService->getAll();
        $semesters = $this->semesterService->getAll();
        $levels = $this->levelService->getAll();
        return view('department.result.analysis',compact('sessions','semesters','studentResults','levels'));
    }
}
