<?php

use App\Http\Controllers\Department\CourseController;
use App\Http\Controllers\Department\DashboardController;
use App\Http\Controllers\Department\LecturerController;
use App\Http\Controllers\Department\ResultController;
use App\Http\Controllers\Department\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isDepartment'])->prefix('department')->as('department.')->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('lecturers')->as('lecturer.')->group(function () {
        Route::get('', [LecturerController::class,'index'])->name('index');
        Route::get('new', [LecturerController::class,'create'])->name('create');
        Route::post('', [LecturerController::class,'store'])->name('store');
    });

    Route::prefix('students')->as('student.')->group(function () {
        Route::get('', [StudentController::class,'index'])->name('index');
        Route::get('new', [StudentController::class,'create'])->name('create');
        Route::post('', [StudentController::class,'store'])->name('store');
    });

    Route::prefix('courses')->as('course.')->group(function () {
        Route::get('', [CourseController::class,'index'])->name('index');
        Route::get('new', [CourseController::class,'create'])->name('create');
        Route::post('', [CourseController::class,'store'])->name('store');
    });

    Route::prefix('results')->as('result.')->group(function () {
        Route::get('', [ResultController::class,'index'])->name('index');
        Route::get('{departmentCourseId}', [ResultController::class,'show'])->name('show');
        Route::post('analysis', [ResultController::class,'getAnalysisForDepartment'])->name('analysis');
    });
});
