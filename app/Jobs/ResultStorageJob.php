<?php

namespace App\Jobs;

use App\Models\DepartmentCourse;
use App\Models\DepartmentCourseResult;
use App\Models\Result;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\Attributes\WithoutRelations;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResultStorageJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    // [#WithoutRelations]
    //protected Result $result
    //$this->result->withoutRelations();
    public function __construct(protected string $csvFile, protected array $csvData, protected int $departmentCourseId, protected int $lecturerId)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        DB::transaction(function () {
            $this->deleteExistingRecords($this->departmentCourseId);
            $courseUnit = $this->getCourseUnit($this->departmentCourseId);
            DepartmentCourseResult::create([
                'department_course_id' => $this->departmentCourseId,
                'user_id' => $this->lecturerId,
                'uploaded_file' => storage_path($this->csvFile),
            ]);

            $resultsData = [];

            foreach ($this->csvData as $data) {
                $gradeAndGp = $this->getGradeAndGp($data['Total Score'], $courseUnit);
                $resultsData[] = [
                    'department_course_id' => $this->departmentCourseId,
                    'matric_no' => $data['Matric No'],
                    'test_score' => $data['CA Score'],
                    'exam_score' => $data['Exam Score'],
                    'total_score' => $data['Total Score'],
                    'course_unit' => $courseUnit,
                    'grade' => $gradeAndGp[0],
                    'gp' => $gradeAndGp[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (!empty($resultsData)) {
                Result::insert($resultsData);
            }
        });
    }

    public function deleteExistingRecords($departmentCourseId) {
        DepartmentCourseResult::whereDepartmentCourseId($departmentCourseId)->delete();
        Result::whereDepartmentCourseId($departmentCourseId)->delete();
    }
    // public function getCsvUploadedPath($path) {
    //     $position = strpos($path, '\public');
    //     $substring = substr($path, $position + strlen('\public'));
    //     return str_replace('\\', '/', $substring);
    // }
    public function getGradeAndGp(int $score, int|float $courseUnit) : array {
        if ($score >= 75) {
            $gp = 4.00 * $courseUnit;
            return ['A', $gp];
        }
        if ($score >= 70 && $score < 75) {
            $gp = 3.50 * $courseUnit;
            return ['AB',$gp];
        }
        if ($score >= 65 && $score < 70) {
            $gp = 3.25 * $courseUnit;
            return ['B',$gp];
        }
        if ($score >= 60 && $score < 65) {
            $gp = 3.00 * $courseUnit;
            return ['BC',$gp];
        }
        if ($score >= 55 && $score < 60) {
            $gp = 2.75 * $courseUnit;
            return ['C',$gp];
        }
        if ($score >= 50 && $score < 55) {
            $gp = 2.50 * $courseUnit;
            return ['CD',$gp];
        }
        if ($score >= 45 && $score < 50) {
            $gp = 2.25 * $courseUnit;
            return ['D',$gp];
        }
        if ($score >= 40 && $score < 45) {
            $gp = 2.00 * $courseUnit;
            return ['E',$gp];
        }

        return ['F', 0.00];
    }

    public function getCourseUnit($departmentCourseId) : int {
        $departmentCourse = DepartmentCourse::find($departmentCourseId);
        return $departmentCourse->course->unit;
    }
}
