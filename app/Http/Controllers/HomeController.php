<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $employees = Employee::count();
        return view('admin.pages.dashboard', compact('employees'));
    }
}
