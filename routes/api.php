<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
//logout
Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->middleware('auth:sanctum');
//roles
Route::apiResource('/roles', App\Http\Controllers\API\RoleController::class)->middleware('auth:sanctum');
//depaerments
Route::apiResource('/departemnts', App\Http\Controllers\API\DepartmentController::class)->middleware('auth:sanctum');
//designations
Route::apiResource('/designations', App\Http\Controllers\API\DesignationController::class)->middleware('auth:sanctum');
//shifts
Route::apiResource('/shifts', App\Http\Controllers\API\ShiftController::class)->middleware('auth:sanctum');
//basic salaries
Route::apiResource('/basic-salaries', App\Http\Controllers\API\BasicSalaryController::class)->middleware('auth:sanctum');
//holidays
Route::apiResource('/holidays', App\Http\Controllers\API\HolidayController::class)->middleware('auth:sanctum');
//leave type
Route::apiResource('/leave-types', App\Http\Controllers\API\LeaveTypeController::class)->middleware('auth:sanctum');
//leaves
Route::apiResource('/leaves', App\Http\Controllers\API\LeaveController::class)->middleware('auth:sanctum');
