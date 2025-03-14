<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/employee', function (Request $request) {
    return $request->user();
});

Route::get('employees', [EmployeeController::class, 'index']);
Route::put('employeeupdate/{id}', [EmployeeController::class, 'update']);
Route::post('addnew', [EmployeeController::class, 'store']);
Route::delete('employeedelete/{id}', [EmployeeController::class, 'destroy']);
Route::post('task', [TaskController::class, 'store']);