<?php

namespace App\Http\Controllers\Lecturer;

use App\Exports\DepartmentStudentExport;
use App\Http\Controllers\Controller;
use App\Models\DepartmentCourse;
use App\Services\Lecturer\CourseService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{

    public function __construct(protected CourseService $courseService) {}

    public function index() {
        $courses = $this->courseService->getCoursesThatHaveResult();
        return view('lecturer.result.index', compact('courses'));
    }

    public function downloadStudentCSV(DepartmentCourse $departmentCourse) {
        $departmentId = $departmentCourse->department_id;
        $levelId = $departmentCourse->level_id;
        $departmentCourse->load('course','department');
        $filename = $departmentCourse->course?->code .'-'. $departmentCourse->level?->name .'clean-sheet.csv';
        if (file_exists(asset("storage/uploads/$filename"))) {
            return asset("storage/uploads/$filename");
        }
        $studentExportData = new DepartmentStudentExport($departmentId, $levelId);
        Excel::store($studentExportData, "uploads/$filename");
        return Excel::download($studentExportData, $filename);
    }
}

