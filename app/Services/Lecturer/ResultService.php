<?php
namespace App\Services\Lecturer;

use App\Jobs\ResultStorageJob;
use App\Models\DepartmentCourse;
use App\Models\Result;
use App\Services\StudentService;
use App\Traits\FileTrait;
use Exception;

class ResultService {

    use FileTrait;

    public function __construct(protected Result $result, protected StudentService $studentService, protected DepartmentCourse $departmentCourse) {
    }

    public function getDepartmentCourseResult(int $departmentCourseId) {
        $departmentCourse = $this->departmentCourse->whereId($departmentCourseId)->with('course','department','results')->first();
        $results = $departmentCourse->results->toArray();
        $resultAnalysis = $this->getResultAnalysis($results);
        return compact('departmentCourse', 'resultAnalysis');
    }

    public function upload(array $data) {
        $department_course_id = $data['department_course_id'];
        $csvFile = $this->uploadCsv('uploads', $data['csv_file']);
        $csvData = $this->readCSV($csvFile);
        $students = $this->getDepartmentStudents($department_course_id);

        $studentsNotInCSV = $this->getStudentsNotInCSV($csvData, $students);

        if (!empty($studentsNotInCSV)) {
            $notFoundStudents = implode(', ', $studentsNotInCSV);
            $this->deleteCSVFile($csvFile);
            throw new Exception("Error! These students' results are not found: $notFoundStudents");
        }

        $studentsWithInvalidScore = $this->getStudentsWithInvalidScore($csvData);
        if (!empty($studentsWithInvalidScore)) {
            $invalidScoresStudent = implode(', ', $studentsWithInvalidScore);
            $this->deleteCSVFile($csvFile);
            throw new Exception("Error! These students' results are not correct: $invalidScoresStudent");
        }

        ResultStorageJob::dispatch($csvFile, $csvData, $department_course_id, auth()->id());


    }

    public function getDepartmentStudents($departmentCourseId) : array {
        $departmentCourse = $this->departmentCourse->find($departmentCourseId);
        $departmentId = $departmentCourse->department_id;
        $levelId = $departmentCourse->level_id;

        $students = $this->studentService->getDepartmentLevelStudent($departmentId, $levelId);
        return $students->pluck("matric_no")->toArray();
    }

    public function getStudentsNotInCSV($csvData, $students) : array {
        $studentsFromCSV = array_column($csvData, "Matric No");
        return array_diff($students,$studentsFromCSV);
    }

    public function getStudentsWithInvalidScore($csvData) : array {
        $studentsWithInvalidScore = [];
        foreach ($csvData as $data) {
            if ($data['CA Score'] + $data['Exam Score'] != $data['Total Score']) {
                $studentsWithInvalidScore[] = $data['Matric No'];
            }
        }
        return $studentsWithInvalidScore;
    }

    public function getResultAnalysis($resultArray) : array {
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

}
