<?php

use App\Http\Controllers\Lecturer\DashboardController;
use App\Http\Controllers\Lecturer\CourseController;
use App\Http\Controllers\Lecturer\ResultController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isLecturer'])->prefix('lecturer')->as('lecturer.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('courses')->as('course.')->group(function () {
        Route::get('', [CourseController::class,'index'])->name('index');
        Route::get('{departmentCourse}/template', [CourseController::class,'downloadStudentCSV'])->name('downloadStudentCSV');
    });

    Route::prefix('results')->as('result.')->group(function () {
        // Route::get('{departmentCourse}/result', [ResultController::class,'index'])->name('index');
        Route::get('{departmentCourse}', [ResultController::class,'show'])->name('show');
        Route::get('{departmentCourse}/upload', [ResultController::class,'create'])->name('create');
        Route::post('{departmentCourseId}/upload', [ResultController::class,'upload'])->name('upload');
    });
});
