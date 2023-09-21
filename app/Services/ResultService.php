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

    public function getAnalysisForDepartment($sessionId, $semesterId, $departmentId, $levelId = null) {
        $studentFilter = [
            'session_id' => $sessionId,
            'department_id' => $departmentId,
        ];

        if ($levelId) {
            $studentFilter['level_id'] = $levelId;
        }
        $studentsResults = $this->result
        ->whereHas('departmentCourse', function ($query) use($semesterId) {
            return $query->where('semester_id', $semesterId);
        })
        ->whereHas('student', function ($query) use($studentFilter) {
            return $query->where($studentFilter);
        })
        ->with('student.level','student.department')
        ->get()->groupBy('matric_no');

        return ($this->calculateStudentGPA($studentsResults));
    }

    public function calculateStudentGPA($studentsResults) :array{
        $output = [];
        foreach ($studentsResults as $studentsResult) {
            $courseUnits = $studentsResult->sum('course_unit');
            $totalGp = $studentsResult->sum('gp');
            $gpa = number_format((double) $totalGp/$courseUnits,2);
            $matricNo = $studentsResult->first()->matric_no;
            $level = $studentsResult->first()->student->level?->name;
            $department = $studentsResult->first()->student->department?->name;
            $output[] = compact('matricNo','gpa','department','level');
        }
        $gpas = array_column($output, 'gpa');
        array_multisort($gpas, SORT_DESC, $output);
        return ($output);
    }

}
