<?php

use App\Http\Controllers\Navigations\NavigationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/", [NavigationController::class,"index"]);
Route::get("time-in", [NavigationController::class, "timeIn"]);
Route::get("/login", [NavigationController::class,"login"]);
Route::get("/admin", [NavigationController::class,"adminLogin"]);
Route::get("/admin/login", [NavigationController::class,"adminLogin"]);
Route::get("/admin/dashboard", [NavigationController::class,"adminDashboard"])->name("dashboard");
Route::get("/admin/reports", [NavigationController::class,"reports"])->name("reports");
Route::get("/admin/users", [NavigationController::class,"users"])->name("users");
