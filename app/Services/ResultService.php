<?php
namespace App\Services;

use App\Jobs\ResultStorageJob;
use App\Models\DepartmentCourse;
use App\Models\Result;
use App\Services\StudentService;
use App\Traits\FileTrait;
use App\Utils\DepartmentUtil;
use Exception;
use Illuminate\Http\Request;

class ResultService {

    use FileTrait;

    public function __construct(protected Result $result, protected StudentService $studentService, protected DepartmentCourse $departmentCourse) {
    }

    public function getDepartmentCourseResult(int $departmentCourseId) {
        $departmentCourse = $this->departmentCourse->whereId($departmentCourseId)->with('course','department','results','semester','lecturerCourse.user')->first();
        $results = $departmentCourse->results->toArray();
        $resultAnalysis = $this->getPassesAnalysis($results);
        return compact('departmentCourse', 'results', 'resultAnalysis');
    }

    public function getPassesAnalysis($resultArray) : array {
        $totalCount = count($resultArray);
        $passed = 0;
        $failed = 0;

        foreach ($resultArray as $result) {
            if ($result['grade'] === 'F') {
                $failed++;
            } else {
                $passed++;
            }
        }

        $passedPercentage = ($passed / $totalCount) * 100;
        $failedPercentage = ($failed / $totalCount) * 100;

        return compact('passedPercentage','failedPercentage','passed','failed','totalCount');
    }

    public function getAnalysisForDepartment($sessionId, $semesterId) {
        $departmentId = DepartmentUtil::getDepartmentId(auth()->user());

        dd($this->result->whereHas('departmentCourse', function ($query) use($sessionId, $semesterId, $departmentId) {
            return $query->where([
                'session_id' => $sessionId,
                'semester_id' => $semesterId,
                'department_id' => $departmentId,
            ]);
        })->groupBy('matric_no')->get());
    }

}
