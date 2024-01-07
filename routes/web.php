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
use App\Http\Controllers\TaskController;
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

// job list section
Route::get('/JobList', [FrontendHomeController::class, 'jobList'])->name('jobList');
Route::get('/aboutUs', [FrontendHomeController::class, 'aboutUs'])->name('aboutUs');

// Notice section
// Route::get('/notice', [FrontendHomeController::class, 'notice'])->name('notice');


// Contact Us Section
Route::get('/contacts', [FrontendHomeController::class, 'contact'])->name('contacts');
Route::post('/contact/store', [FrontendHomeController::class, 'contactStore'])->name('contactStore');




Route::get('/login', [UserController::class, 'login'])->name('admin.login');
Route::post('/login-form', [UserController::class, 'loginPost'])->name('admin.login.post');
Route::group(['middleware' => 'auth'], function () {

    // Admin Routes (Accessible only by admin users)
    Route::group(['middleware' => ['auth', 'IsAdmin']], function () {

        // Employee Management
        Route::get('/Employee/addEmployee', [manageEmployeeController::class, 'addEmployee'])->name('manageEmployee.addEmployee');
        Route::post('/manageEmployee/addEmployee/store', [manageEmployeeController::class, 'store'])->name('manageEmployee.addEmployee.store');
        Route::get('/Employee/viewEmployee', [viewEmployeeController::class, 'viewEmployee'])->name('manageEmployee.ViewEmployee');
        Route::get('/Employee/delete/{id}', [viewEmployeeController::class, 'delete'])->name('Employee.delete');
        Route::get('Employee/edit/{id}', [viewEmployeeController::class, 'edit'])->name('Employee.edit');
        Route::put('/Employee/update/{id}', [viewEmployeeController::class, 'update'])->name('Employee.update');
        Route::get('/Employee/profile/{id}', [viewEmployeeController::class, 'profile'])->name('Employee.profile');
        Route::get('/search-employee', [viewEmployeeController::class, 'search'])->name('employee.search');


        // attendance
        Route::get('/Attendance/viewAttendance', [AttendanceController::class, 'attendanceList'])->name('attendance.viewAttendance');
        Route::get('/Attendance/AttendanceReport', [AttendanceController::class, 'attendanceReport'])->name('attendanceReport');
        Route::get('/Attendance/searchAttendanceReport', [AttendanceController::class, 'searchAttendanceReport'])->name('searchAttendanceReport');
        Route::get('/Attendance/delete/{id}', [AttendanceController::class, 'attendanceDelete'])->name('attendanceDelete');

        // department
        Route::get('/Organization/department', [OrganizationController::class, 'department'])->name('organization.department');
        Route::post('/Organization/department/store', [OrganizationController::class, 'store'])->name('organization.department.store');
        Route::get('/Organization/delete/{id}', [OrganizationController::class, 'delete'])->name('Organization.delete');
        Route::get('/Organization/edit/{id}', [OrganizationController::class, 'edit'])->name('Organization.edit');
        Route::put('/Organization/update/{id}', [OrganizationController::class, 'update'])->name('Organization.update');

        // designation
        Route::get('/Organization/designation', [DesignationController::class, 'designation'])->name('organization.designation');
        Route::post('/Organization/designation/store', [DesignationController::class, 'designationStore'])->name('organization.designation.store');
        Route::get('/Organization/designationList', [DesignationController::class, 'designationList'])->name('organization.designationList');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'edit'])->name('designation.edit');
        Route::put('/Designation/update/{id}', [DesignationController::class, 'update'])->name('Designation.update');

        // Leave
        Route::get('/Leave/LeaveStatus', [LeaveController::class, 'leaveList'])->name('leave.leaveStatus');
        Route::get('/Leave/allLeaveReport', [LeaveController::class, 'allLeaveReport'])->name('allLeaveReport');
        Route::get('/searchLeaveList', [LeaveController::class, 'searchLeaveList'])->name('searchLeaveList');

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
        Route::get('/SalaryStructure/createSalary', [SalaryController::class, 'createSalary'])->name('salary.create.form');
        Route::get('/SalaryStructure/viewSalary', [SalaryController::class, 'viewSalary'])->name('salary.view');
        Route::post('/Salary/store', [SalaryController::class, 'salaryStore'])->name('salary.store.data');
        Route::get('/Salary/delete/{id}', [SalaryController::class, 'salaryDelete'])->name('salaryDelete');
        Route::get('/Salary/edit/{id}', [SalaryController::class, 'salaryEdit'])->name('salaryEdit');
        Route::put('/Salary/update/{id}', [SalaryController::class, 'salaryUpdate'])->name('salaryUpdate');

        // Payroll
        Route::get('Payroll/createPayroll', [PayrollController::class, 'createPayroll'])->name('payroll.create');
        Route::get('/Payroll/PayrollList', [PayrollController::class, 'viewPayroll'])->name('payroll.view');
        Route::post('/Payroll/store', [PayrollController::class, 'payrollStore'])->name('payroll.store');
        Route::get('/Payroll/Single/{id}', [PayrollController::class, 'singlePayroll'])->name('singlePayroll');
        Route::get('/Payroll/allPayrollList', [PayrollController::class, 'allPayroll'])->name('allPayrollList');
        Route::get('/Payroll/delete/{id}', [PayrollController::class, 'deletePayroll'])->name('payrollDelete');
        Route::get('/Payroll/edit/{id}', [PayrollController::class, 'payrollEdit'])->name('payrollEdit');
        Route::put('/Payroll/update/{id}', [PayrollController::class, 'payrollUpdate'])->name('payrollUpdate');
        Route::get('/search-AllPayroll', [PayrollController::class, 'searchAllPayroll'])->name('searchAllPayroll');


        // Task Management
        Route::get('/Task/createTask', [TaskController::class, 'createTask'])->name('createTask');
        Route::post('/Task/store', [TaskController::class, 'storeTask'])->name('storeTask');
        Route::get('/Task/TaskList', [TaskController::class, 'taskList'])->name('taskList');
        Route::get('/Task/delete/{id}', [TaskController::class, 'deleteTask'])->name('deleteTask');
        Route::get('/Task/edit/{id}', [TaskController::class, 'editTask'])->name('editTask');
        Route::put('/Task/update/{id}', [TaskController::class, 'updateTask'])->name('updateTask');




        // User updated
        Route::get('/users', [UserController::class, 'list'])->name('users.list');
        Route::get('/users/create/{employeeId}', [UserController::class, 'createForm'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}', [UserController::class, 'userProfile'])->name('users.profile.view');
        Route::get('/user/delete/{id}', [UserController::class, 'userDelete'])->name('delete');
        Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('edit');
        Route::put('/user/update/{id}', [UserController::class, 'userUpdate'])->name('update');
        Route::get('/search-user', [UserController::class, 'searchUser'])->name('searchUser');


        // Services
        Route::get('/Service/create', [ServicesController::class, 'serviceForm'])->name('service.form');
        Route::post('/Service/store', [ServicesController::class, 'serviceStore'])->name('service.store');
        Route::get('/Service/serviceList', [ServicesController::class, 'serviceList'])->name('list.service');
        Route::get('/Service/serviceDelete/{id}', [ServicesController::class, 'serviceDelete'])->name('serviceDelete');
        Route::get('/Service/serviceEdit/{id}', [ServicesController::class, 'serviceEdit'])->name('serviceEdit');
        Route::put('/Service/serviceUpdate/{id}', [ServicesController::class, 'serviceUpdate'])->name('serviceUpdate');


        // Client List
        Route::get('/Client/create', [ClientController::class, 'clientForm'])->name('client.form');
        Route::post('/Client/store', [ClientController::class, 'clientStore'])->name('clientStore');
        Route::get('/Client/ClientList', [ClientController::class, 'viewClientList'])->name('viewClientList');
        Route::get('/Client/clientDelete/{id}', [ClientController::class, 'clientDelete'])->name('clientDelete');
        Route::get('/Client/clientEdit/{id}', [ClientController::class, 'clientEdit'])->name('clientEdit');
        Route::put('/Client/clientUpdate/{id}', [ClientController::class, 'clientUpdate'])->name('clientUpdate');



        // message info
        Route::get('/contactUs/Message', [HomeController::class, 'message'])->name('message');

        // Notice Section

        // Route::get('/notice', [FrontendHomeController::class, 'notice'])->name('notice.create');
        // Route::post('/notice/store', [FrontendHomeController::class, 'noticeStore'])->name('notice.store');
        // Route::get('/notice', [FrontendHomeController::class, 'showNotice'])->name('show.notice');
    });


    // Employee route

    Route::group(['middleware' => ['auth', 'IsEmployee']], function () {

        // Attendance Routes for Employee
        Route::get('/Attendance/giveAttendance', [AttendanceController::class, 'giveAttendance'])->name('attendance.giveAttendance');
        Route::get('/check-in', [AttendanceController::class, 'checkIn'])->name('check-in');
        Route::get('/check-out', [AttendanceController::class, 'checkOut'])->name('check-out');
        Route::get('/attendance/myAttendance', [AttendanceController::class, 'myAttendance'])->name('attendance.myAttendance');
        Route::get('/attendance/myAttendanceReport', [AttendanceController::class, 'myAttendanceReport'])->name('myAttendanceReport');
        Route::get('/attendance/searchMyAttendance', [AttendanceController::class, 'searchMyAttendance'])->name('searchMyAttendance');


        // Leave Routes for Employee
        Route::get('/Leave/LeaveForm', [LeaveController::class, 'leave'])->name('leave.leaveForm');
        Route::post('/Leave/store', [LeaveController::class, 'store'])->name('leave.store');
        Route::get('/Leave/myLeave', [LeaveController::class, 'myLeave'])->name('leave.myLeave');
        Route::get('/Leave/myLeaveBalance', [LeaveController::class, 'showLeaveBalance'])->name('leave.myLeaveBalance');
        Route::get('/Leave/myLeaveReport', [LeaveController::class, 'myLeaveReport'])->name('myLeaveReport');
        Route::get('/searchMyLeave', [LeaveController::class, 'searchMyLeave'])->name('searchMyLeave');


        // My Task
        Route::get('/Task/MyTask', [TaskController::class, 'myTask'])->name('myTask');
        // Task Complete
        Route::get('/Task/CompleteInTime/{id}',  [TaskController::class, 'completeTaskOnTime'])->name('taskComplete');
        Route::get('/Task/CompleteInLate/{id}',  [TaskController::class, 'completeTaskLate'])->name('taskCompleteLate');



        // user profile
        Route::get('/myProfile', [UserController::class, 'myProfile'])->name('profile');

        // payroll
        Route::get('/Payroll/MyPayrollList', [PayrollController::class, 'myPayroll'])->name('myPayroll');
        Route::get('/Payroll/mySingle/{id}', [PayrollController::class, 'MySingle'])->name('mySinglePayroll');
        Route::get('/search-myPayroll', [PayrollController::class, 'searchMyPayroll'])->name('searchMyPayroll');



        // Notices for Employee
        // Route::get('/notice', [FrontendHomeController::class, 'showNotice'])->name('show.notice');
        // ... Additional Employee-specific routes
    });
    Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('/dashboard', [HomeController::class, 'home'])->name('dashboard');
    Route::get('/notice', [FrontendHomeController::class, 'showNotice'])->name('show.notice');
    Route::get('/notice/create', [FrontendHomeController::class, 'notice'])->name('notice.create');
    Route::post('/notice/store', [FrontendHomeController::class, 'noticeStore'])->name('notice.store');
    Route::get('/notice/noticeList', [FrontendHomeController::class, 'noticeList'])->name('noticeList');
    Route::get('/notice/noticeDelete/{id}', [FrontendHomeController::class, 'noticeDelete'])->name('noticeDelete');
    Route::get('/notice/noticeEdit/{id}', [FrontendHomeController::class, 'noticeEdit'])->name('noticeEdit');
    Route::put('/notice/noticeUpdate/{id}', [FrontendHomeController::class, 'noticeUpdate'])->name('noticeUpdate');
});
