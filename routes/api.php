<?php

use App\Models\Department;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
