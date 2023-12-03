<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\Frontend\ClientController;
use App\Http\Controllers\Frontend\homeController as FrontendHomeController;
use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\HomeController;
use App\Http\controllers\manageEmployeeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\ServicesController;
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
Route::get('/', [FrontendHomeController::class, 'home'])->name('home');

// service section
Route::get('/services', [FrontendHomeController::class, 'service'])->name('services');
Route::get('/services/details/{id}', [FrontendHomeController::class, 'details'])->name('services.details');

// client list
Route::get('/clientList', [ClientController::class, 'clientList'])->name('client.list');



// Notice section
Route::get('/notice', [FrontendHomeController::class, 'notice'])->name('notice');
Route::post('/notice/store', [FrontendHomeController::class, 'noticeStore'])->name('notice.store');


// Contact Us Section
Route::get('/contacts', [FrontendHomeController::class, 'contact'])->name('contacts');



// Admin Dashboard
Route::group(['prefix' => 'admin'], function () {

    Route::get('/login', [UserController::class, 'login'])->name('admin.login');
    Route::post('/login-form', [UserController::class, 'loginPost'])->name('admin.login.post');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
        Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');

        // Employees
        Route::get('/Employee/addEmployee', [manageEmployeeController::class, 'addEmployee'])->name('manageEmployee.addEmployee');
        Route::post('/manageEmployee/addEmployee/store', [manageEmployeeController::class, 'store'])->name('manageEmployee.addEmployee.store');
        Route::get('/Employee/viewEmployee', [viewEmployeeController::class, 'viewEmployee'])->name('manageEmployee.ViewEmployee');
        Route::get('/Employee/delete/{id}', [viewEmployeeController::class, 'delete'])->name('Employee.delete');
        Route::get('Employee/edit/{id}', [viewEmployeeController::class, 'edit'])->name('Employee.edit');
        Route::put('/Employee/update/{id}', [viewEmployeeController::class, 'update'])->name('Employee.update');
        Route::get('/Employee/profile/{id}', [viewEmployeeController::class, 'profile'])->name('Employee.profile');

        // Attendance
        Route::get('/Attendance/viewAttendance', [AttendanceController::class, 'attendanceList'])->name('attendance.viewAttendance');
        Route::get('/Attendance/giveAttendance', [AttendanceController::class, 'giveAttendance'])->name('attendance.giveAttendance');
        // attendance employee
        Route::get('/check-in', [AttendanceController::class, 'checkIn'])->name('check-in');
        Route::get('/check-out', [AttendanceController::class, 'checkOut'])->name('check-out');



        // Department
        Route::get('/Organization/department', [OrganizationController::class, 'department'])->name('organization.department');
        // Route::get('/Organization/department/list', [OrganizationController::class, 'departmentList'])->name('organization.departmentList');
        Route::post('/Organization/department/store', [OrganizationController::class, 'store'])->name('organization.department.store');
        Route::get('/Organization/delete/{id}', [OrganizationController::class, 'delete'])->name('Organization.delete');
        Route::get('/Organization/edit/{id}', [OrganizationController::class, 'edit'])->name('Organization.edit');
        Route::put('/Organization/update/{id}', [OrganizationController::class, 'update'])->name('Organization.update');


        // Designation
        Route::get('/Organization/designation', [DesignationController::class, 'designation'])->name('organization.designation');
        Route::post('/Organization/designation/store', [DesignationController::class, 'designationStore'])->name('organization.designation.store');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::put('/designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');


        // Leave
        Route::get('/Leave/LeaveForm', [LeaveController::class, 'leave'])->name('leave.leaveForm');
        Route::get('/Leave/LeaveStatus', [LeaveController::class, 'leaveList'])->name('leave.leaveStatus');
        Route::post('/Leave/store', [LeaveController::class, 'store'])->name('leave.store');
        Route::get('/Leave/myLeave', [LeaveController::class, 'myLeave'])->name('leave.myLeave');
        Route::get('/Leave/myLeaveBalance', [LeaveController::class, 'showLeaveBalance'])->name('leave.myLeaveBalance');
        // Approve,, Reject Leave
        Route::get('/leave/approve/{id}',  [LeaveController::class, 'approveLeave'])->name('leave.approve');
        Route::get('/leave/reject/{id}',  [LeaveController::class, 'rejectLeave'])->name('leave.reject');


        // Leave Type
        Route::get('/Leave/LeaveType', [LeaveController::class, 'leaveType'])->name('leave.leaveType');
        Route::post('/Leave/LeaveType/store', [LeaveController::class, 'leaveStore'])->name('leave.leaveType.store');
        Route::get('/LeaveType/delete/{id}', [LeaveController::class, 'LeaveDelete'])->name('leave.leaveType.delete');
        Route::get('/LeaveType/edit/{id}', [LeaveController::class, 'leaveEdit'])->name('leave.leaveType.edit');
        Route::put('/designation/update/{id}', [LeaveController::class, 'LeaveUpdate'])->name('leave.leaveType.update');


        // Salary Structure
        Route::get('/SalaryStructure/createSalary', [SalaryController::class, 'createSalary'])->name('salary.create');
        Route::get('/SalaryStructure/viewSalary', [SalaryController::class, 'viewSalary'])->name('salary.view');
        Route::post('/Payroll/store', [SalaryController::class, 'salaryStore'])->name('salary.store');



        // Users
        Route::get('/users/create', [UserController::class, 'createForm'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users', [UserController::class, 'list'])->name('users.list');
        Route::get('/users/profile/{id}', [UserController::class, 'userProfile'])->name('users.profile.view');

        // Services
        Route::get('/Service/create', [ServicesController::class, 'serviceForm'])->name('service.form');
        Route::post('/Service/store', [ServicesController::class, 'serviceStore'])->name('service.store');
    });
});
