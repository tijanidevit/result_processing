<?php

use App\Http\Controllers\Dean\DashboardController;
use App\Http\Controllers\Dean\DepartmentController;
use App\Http\Controllers\Dean\HODController;
use App\Http\Controllers\Dean\ResultController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isDean'])->prefix('dean')->as('dean.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('departments')->as('department.')->group(function () {
        Route::get('', [DepartmentController::class,'index'])->name('index');
        Route::get('new', [DepartmentController::class,'create'])->name('create');
        Route::post('', [DepartmentController::class,'store'])->name('store');
    });

    Route::prefix('hods')->as('hod.')->group(function () {
        Route::get('', [HODController::class,'index'])->name('index');
        Route::get('new', [HODController::class,'create'])->name('create');
        Route::post('', [HODController::class,'store'])->name('store');
    });

    Route::prefix('results')->as('result.')->group(function () {
        Route::get('', [ResultController::class,'index'])->name('index');
    });
});
