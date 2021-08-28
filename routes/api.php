<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\admin\AttendanceController;
use App\Http\Controllers\admin\EmployeeOfMonthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(["middleware" => ["auth:sanctum"]], function()
{

    Route::resource('reports', ReportController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('employeeofmonths', EmployeeOfMonthController::class);



    Route::post('/auth/logout', [AuthController::class, 'logout']);

});


