<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryStructure;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class viewEmployeeController extends Controller
{
    // public function viewEmployee()
    // {
    //     $employees = Employee::with(['department', 'designation', 'salaryStructure'])->paginate(5);
    //     return view('admin.pages.manageEmployee.viewEmployee', compact('employees'));
    // }
    public function viewEmployee()
    {
        $employees = Employee::with(['department', 'designation', 'salaryStructure'])
            ->latest('id')
            ->paginate(10);

        return view('admin.pages.manageEmployee.viewEmployee', compact('employees'));
    }


    // Delete employee
    public function delete($id)
    {
        $employee = Employee::find($id);

        if ($employee) {
            $user = User::find($employee->user_id);

            if ($user) {
                $user->delete(); // Delete associated user
            }

            $employee->delete(); // Delete employee record
            notify()->success('Employee Deleted Successfully.');
            return redirect()->back();
        } elseif (!$employee) {
            notify()->error('Employee not found');
            return redirect()->back();
        }
    }



    // Edit Employee
    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        $designations = Designation::all();
        $salaries = SalaryStructure::all();
        return view('admin.pages.manageEmployee.EditEmployee', compact('employee', 'departments', 'designations', 'salaries'));
    }

    // Update Employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee) {

            $validate = Validator::make($request->all(), [
                'name' => 'required',
                'employee_id' => 'required',
                'department_id' => 'required',
                'designation_id' => 'required',
                'salary_structure_id' => 'required',
                'date_of_birth' => 'required|date',
                'hire_date' => 'required|date',
                'email' => 'required|email|max:255|unique:employees,email,' . $id,
                'phone' => 'required|string|max:20|min:11|regex:/^(?:\+?88)?01[3-9]\d{8}$/',
                'joining_mode' => 'required',
                'location' => 'required|string|max:100',
            ]);

            if ($validate->fails()) {

                notify()->error($validate->getMessageBag());
                return redirect()->back();
            }

            $fileName = $employee->employee_image;
            if ($request->hasFile('employee_image')) {
                $file = $request->file('employee_image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }

            $employee->update([
                'name' => $request->name,
                'employee_id' => $request->employee_id,
                'employee_image' => $fileName,
                'department_id' => $request->department_id,
                'salary_structure_id' => $request->salary_structure_id,
                'designation_id' => $request->designation_id,
                'date_of_birth' => $request->date_of_birth,
                'hire_date' => $request->hire_date,
                'email' => $request->email,
                'phone' => $request->phone,
                'joining_mode' => $request->joining_mode,
                'location' => $request->location,
            ]);

            notify()->success('Your information updated successfully.');
            return redirect()->route('manageEmployee.ViewEmployee');
        }
    }

    public function profile($id)
    {
        $employee = Employee::find($id);
        $departments = Department::all();
        $designations = Designation::all();
        $salaries = SalaryStructure::all();
        return view('admin.pages.manageEmployee.employeeProfile', compact('employee', 'departments', 'designations', 'salaries'));
    }

    // search Employee

    public function search(Request $request)
    {
        $searchTerm = $request->search;

        // Query builder for Employee model
        $query = Employee::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('employee_id', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('department', function ($departmentQuery) use ($searchTerm) {
                        $departmentQuery->where('department_name', 'LIKE', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('designation', function ($designationQuery) use ($searchTerm) {
                        $designationQuery->where('designation_name', 'LIKE', '%' . $searchTerm . '%');
                    })
                    ->orWhere('joining_mode', 'LIKE', '%' . $searchTerm . '%');
                // Add more conditions based on your search requirements
            });
        }

        $employees = $query->paginate(10); // Change 10 to the desired number of items per page

        $departments = Department::all();
        $designations = Designation::all();
        $salaries = SalaryStructure::all();

        return view("admin.pages.manageEmployee.searchEmployee", compact('employees', 'departments', 'designations', 'salaries'));
    }
}
