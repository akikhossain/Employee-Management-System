<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class manageEmployeeController extends Controller
{
    public function addEmployee()
    {
        return view('admin.pages.manageEmployee.addEmployee');
    }
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'employee_id' => 'required',
            'department' => 'required',
            'password' => 'required',
            'designation' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'salary' => 'required',
            'location' => 'required',
        ]);

        if ($validate->fails()) {

            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        Employee::create([
            'name' => $request->name,
            'employee_id' => $request->employee_id,
            'department' => $request->department,
            'password' => $request->password,
            'designation' => $request->designation,
            'email' => $request->email,
            'phone' => $request->phone,
            'salary' => $request->salary,
            'location' => $request->location,
        ]);
        notify()->success('New Employee created successfully.');
        return redirect()->route('manageEmployee.ViewEmployee');
    }
}
