<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SchoolService;
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
        protected SchoolService $schoolService,
        protected LevelService $levelService,
    ) {}


    public function index() {
        $sessions = $this->sessionService->getAll();
        $sessions = $this->sessionService->getAll();
        $semesters = $this->semesterService->getAll();
        $levels = $this->levelService->getAll();
        $schools = $this->schoolService->getAll();
        return view('admin.result.analysis',compact('sessions','semesters','levels','schools'));
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
