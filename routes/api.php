<?php

use App\Http\Controllers\Admin\ResultController;
use App\Models\Department;
use App\Models\DepartmentCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('school/{schoolId}/departments', function (Request $request) {
    return Department::whereSchoolId($request->schoolId)->get();
})->name('api.school.departments');


Route::get('department/courses', function (Request $request) {
    return DepartmentCourse::where([
        'level_id' => $request->levelId,
        'department_id' => $request->departmentId,
        'semester_id' => $request->semesterId,
    ])->with('course')->get();
})->name('api.department.courses');


Route::get('result/analysis',[ResultController::class, 'getAnalysisForDepartment'])->name('api.result.analysis');

Route::get('result/course',[ResultController::class, 'show'])->name('api.result.course');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
