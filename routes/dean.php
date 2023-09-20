<?php

use App\Http\Controllers\Dean\DashboardController;
use App\Http\Controllers\Dean\DepartmentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','isDean'])->prefix('dean')->as('dean.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix('hods')->as('hod.')->group(function () {
        Route::get('', [DepartmentController::class,'index'])->name('index');
        Route::get('new', [DepartmentController::class,'create'])->name('create');
        Route::post('', [DepartmentController::class,'store'])->name('store');
    });
});
