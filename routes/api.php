<?php

use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\ManagerController;
use App\Http\Controllers\Api\Admin\ReportsController;
use App\Http\Controllers\Api\Admin\ShiftController;
use App\Http\Controllers\Api\Admin\TeachersController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\Teacher\TimeInController;
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

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/admin/managers', [ManagerController::class, 'index']);
  Route::get('/admin/shifts', [ShiftController::class, 'index']);
  Route::get('/admin/my-teachers', [TeachersController::class, 'getMyTeachers']);
  Route::post('/admin/teachers-logged-in', [DashboardController::class, 'teachersLoggedInToday']);
  Route::post('/admin/time-record-daily', [ReportsController::class, 'reports']);

  Route::post('/teacher/time-in', [TimeInController::class, 'timeIn']);
  Route::post('/teacher/check-time-in', [TimeInController::class, 'checkTimeIn']);
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
