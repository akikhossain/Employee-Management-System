<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\Payroll;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $employees = Employee::count();
        $departments = Department::count();

        $pendingLeaves = 0; // Default value for pending leaves

        $user = auth()->user();

        if ($user && $user->role === 'Admin') {
            // For admin, count all pending leave requests
            $totalLeaves = Leave::count();
            $approvedLeaves = Leave::where('status', 'approved')->count();
            $rejectedLeaves = Leave::where('status', 'rejected')->count();
            $pendingLeaves = $totalLeaves - ($approvedLeaves + $rejectedLeaves);
            // $payrolls = Payroll::count();
        } else {
            // For authenticated users who are not admins, count their own pending leave requests
            $userId = $user ? $user->id : null;
            $totalLeaves = Leave::where('employee_id', $userId)->count();
            $approvedLeaves = Leave::where('employee_id', $userId)->where('status', 'approved')->count();
            $rejectedLeaves = Leave::where('employee_id', $userId)->where('status', 'rejected')->count();
            $pendingLeaves = $totalLeaves - ($approvedLeaves + $rejectedLeaves);
        }

        $users = User::count();
        $completedOnTimeTasks = Task::where('status', 'completed on time')->count();
        $completedInLateTasks = Task::where('status', 'completed in late')->count();
        $totalCompletedTasks = $completedOnTimeTasks + $completedInLateTasks;

        $totalTasks = Task::count() - $totalCompletedTasks;

        // Now you can use $totalTasks in your view or wherever needed
        return view('admin.pages.dashboard', compact('employees', 'departments', 'pendingLeaves', 'users', 'totalTasks'));
    }



    public function showHeader()
    {
        // Fetch the logged-in user
        $user = auth()->user();

        return view('admin.partials.header', compact('user'));
    }


    // contact message
    public function message()
    {
        $messages = Contact::all();
        return view('admin.pages.contactMessage.contactMessage', compact('messages'));
    }
}
