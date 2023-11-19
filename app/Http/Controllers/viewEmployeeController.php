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
    public function delete($id)
    {
        $employee = Employee::find($id);
        if ($employee) {
            $employee->delete();
        }
        notify()->success('Employee Deleted Successfully.');
        return redirect()->back();
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('admin.pages.manageEmployee.EditEmployee', compact('employee'));
    }
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee) {

            // $fileName = $employee->image;
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            //     $file->storeAs('/uploads', $fileName);
            // }

            $employee->update([
                'name' => $request->name,
                'employee_id' => $request->employee_id,
                'department' => $request->department,
                'date_of_birth' => $request->date_of_birth,
                'designation' => $request->designation,
                'hire_date' => $request->hire_date,
                'email' => $request->email,
                'phone' => $request->phone,
                'salary' => $request->salary,
                'location' => $request->location,
            ]);

            notify()->success('Your information updated successfully.');
            return redirect()->route('manageEmployee.ViewEmployee');
        }
    }
}
