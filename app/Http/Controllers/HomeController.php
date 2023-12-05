<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $employees = Employee::count();
        $departments = Department::count();
        $leaves = Leave::count();
        $users = User::count();
        return view('admin.pages.dashboard', compact('employees', 'departments', 'leaves', 'users'));
    }

    public function showHeader()
    {
        // Fetch the logged-in user
        $user = auth()->user();

        return view('admin.partials.header', compact('user'));
    }
}
