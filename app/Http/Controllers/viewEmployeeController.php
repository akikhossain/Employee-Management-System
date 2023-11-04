<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class viewEmployeeController extends Controller
{
    public function viewEmployee()
    {
        $employees = Employee::paginate(8);
        return view('admin.pages.manageEmployee.viewEmployee', compact('employees'));
    }
}
