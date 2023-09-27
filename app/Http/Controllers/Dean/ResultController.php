<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Services\Dean\DepartmentService;
use App\Services\LevelService;
use App\Services\ResultService;
use App\Services\SemesterService;
use App\Services\SessionService;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function __construct(
        protected ResultService $resultService,
        protected SessionService $sessionService,
        protected SemesterService $semesterService,
        protected LevelService $levelService,
        protected DepartmentService $departmentService,
    ) {}


    public function index() {
        $sessions = $this->sessionService->getAll();
        $sessions = $this->sessionService->getAll();
        $semesters = $this->semesterService->getAll();
        $levels = $this->levelService->getAll();
        $departments = $this->departmentService->getAll();
        return view('dean.result.analysis',compact('sessions','semesters','levels','departments'));
    }
    public function show(Request $request) {
        $resultData = $this->resultService->getDepartmentCourseResult($request->departmentCourseId);
        return $resultData;
    }

    public function getAnalysisForDepartment(Request $request) {
        $studentResults = $this->resultService->getAnalysisForDepartment($request->session_id,$request->semester_id, $request->department_id, $request->level_id);

        return $studentResults;
    }
}
