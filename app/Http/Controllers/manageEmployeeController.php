<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class manageEmployeeController extends Controller
{
    public function addEmployee()
    {
        return view('admin.pages.manageEmployee.addEmployee');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        Employee::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'password' => $request->password,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'location' => $request->location,
        ]);

        return redirect()->route('manageEmployee.ViewEmployee');
    }
}
