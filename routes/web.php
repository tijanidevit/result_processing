<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeanController;
use App\Http\Controllers\Admin\ResultController;
use Illuminate\Support\Facades\Route;

Route::prefix('login')->middleware('guest')->group(function () {
    Route::post('',[LoginController::class,'login'])->name('loginAction');
});


Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');


Route::prefix('logout')->middleware('auth')->group(function () {
    Route::get('',[LoginController::class,'logout'])->name('logout');
});


Route::middleware(['auth','isAdmin'])->prefix('admin')->as('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('deans')->as('dean.')->group(function () {
        Route::get('', [DeanController::class,'index'])->name('index');
        Route::get('new', [DeanController::class,'create'])->name('create');
        Route::post('', [DeanController::class,'store'])->name('store');
    });

    Route::prefix('results')->as('result.')->group(function () {
        Route::get('', [ResultController::class,'index'])->name('index');
        Route::get('{departmentCourseId}', [ResultController::class,'show'])->name('show');
        Route::post('analysis', [ResultController::class,'getAnalysisForDepartment'])->name('analysis');
    });

    Route::prefix('courses')->as('course.')->group(function () {
        Route::get('', [CourseController::class,'index'])->name('index');
        Route::get('new', [CourseController::class,'create'])->name('create');
        Route::post('', [CourseController::class,'store'])->name('store');
    });
});
