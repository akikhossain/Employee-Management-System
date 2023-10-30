<?php

use App\Http\Controllers\AttendanceController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\manageEmployeeController;
use App\Http\controllers\viewEmployeeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home']);
Route::get('/login', [HomeController::class, 'login']);
Route::get('/manageEmployee/addEmployee', [manageEmployeeController::class, 'addEmployee']);
Route::post('/manageEmployee/addEmployee/store', [manageEmployeeController::class, 'store']);
Route::get('/manageEmployee/viewEmployee', [viewEmployeeController::class, 'viewEmployee']);
Route::get('/attendance/addAttendance', [AttendanceController::class, 'attendance'])->name('attendance.addAttendance');
Route::post('/addAttendance/store', [AttendanceController::class, 'store'])->name('addAttendance.store');
Route::get('/attendance/viewAttendance', [AttendanceController::class, 'attendanceList'])->name('attendance.viewAttendance');
