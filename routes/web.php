<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\Frontend\homeController as FrontendHomeController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\manageEmployeeController;
use App\Http\Controllers\OrganizationController;
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

// Website or Frontend
Route::get('/home', [FrontendHomeController::class, 'home'])->name('home');



// Admin Dashboard
Route::get('admin/login', [UserController::class, 'login'])->name('admin.login');
Route::post('/login-form', [UserController::class, 'loginPost'])->name('admin.login.post');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('/', [HomeController::class, 'home'])->name('dashboard');

    // Employees
    Route::get('/Employee/addEmployee', [manageEmployeeController::class, 'addEmployee'])->name('manageEmployee.addEmployee');
    Route::post('/manageEmployee/addEmployee/store', [manageEmployeeController::class, 'store'])->name('manageEmployee.addEmployee.store');
    Route::get('/Employee/viewEmployee', [viewEmployeeController::class, 'viewEmployee'])->name('manageEmployee.ViewEmployee');


    // Attendance
    Route::get('/Attendance/addAttendance', [AttendanceController::class, 'attendance'])->name('attendance.addAttendance');
    Route::post('/Attendance/store', [AttendanceController::class, 'store'])->name('addAttendance.store');
    Route::get('/Attendance/viewAttendance', [AttendanceController::class, 'attendanceList'])->name('attendance.viewAttendance');


    // Department
    Route::get('/Organization/department', [OrganizationController::class, 'department'])->name('organization.department');
    // Route::get('/Organization/department/list', [OrganizationController::class, 'departmentList'])->name('organization.departmentList');
    Route::post('/Organization/department/store', [OrganizationController::class, 'store'])->name('organization.department.store');


    // Designation
    Route::get('/Organization/designation', [DesignationController::class, 'designation'])->name('organization.designation');
    Route::post('/Organization/designation/store', [DesignationController::class, 'designationStore'])->name('organization.designation.store');



    // Leave
    Route::get('/Leave/LeaveForm', [LeaveController::class, 'leave'])->name('leave.leaveForm');
    Route::get('/Leave/LeaveStatus', [LeaveController::class, 'leaveList'])->name('leave.leaveStatus');
    Route::get('/users', [UserController::class, 'list'])->name('users.list');

    // Users
    Route::get('/users/create', [UserController::class, 'createForm'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
});
