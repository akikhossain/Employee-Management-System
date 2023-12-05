<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class viewEmployeeController extends Controller
{
    public function viewEmployee()
    {
        $employees = Employee::paginate(5);
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
        return view('admin.pages.manageEmployee.EditEmployee', compact('employee'));
    }

    // Update Employee
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        if ($employee) {

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

    public function profile($id)
    {
        $employee = Employee::find($id);
        return view('admin.pages.manageEmployee.employeeProfile', compact('employee'));
    }



    // Salary Structure part

    // public function createSalaryStructure(Request $request, $employeeId)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'salary_class' => 'required',
    //         'basic_salary' => 'required|numeric',
    //         'mobile_bill' => 'required|numeric',
    //         'medical_expenses' => 'required|numeric',
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    // Find the employee
    // $employee = Employee::find($employeeId);
    // if (!$employee) {
    //     abort(404, 'Employee not found');
    // }

    // Create or update salary structure for the employee
    //     $employee->salaryStructure()->updateOrCreate([], [
    //         'salary_class' => $request->salary_class,
    //         'basic_salary' => $request->basic_salary,
    //         'mobile_bill' => $request->mobile_bill,
    //         'medical_expenses' => $request->medical_expenses,
    //         // Add other fields as needed
    //     ]);

    //     notify()->success('Salary Structure updated successfully.');
    //     return redirect()->route('manageEmployee.ViewEmployee');
    // }

    // public function showSalaryStructure($employeeId)
    // {
    //     $employee = Employee::with('salaryStructure')->find($employeeId);
    //     if (!$employee) {
    //         abort(404, 'Employee not found');
    //     }

    //     return view('admin.pages.manageEmployee.viewSalaryStructure', compact('employee'));
    // }



    // Payroll Part

    // public function createPayroll(Request $request, $employeeId)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'salary_structure_id' => 'required|exists:salary_structures,id',
    //         'hour' => 'required|numeric',
    //         // Add other validation rules as needed
    //     ]);

    //     if ($validator->fails()) {
    //         return redirect()->back()->withErrors($validator)->withInput();
    //     }

    //     // Find the employee
    //     $employee = Employee::find($employeeId);
    //     if (!$employee) {
    //         abort(404, 'Employee not found');
    //     }

    //     // Create payroll for the employee
    //     $employee->payrolls()->create([
    //         'salary_structure_id' => $request->salary_structure_id,
    //         'hour' => $request->hour,
    //         // Add other fields as needed
    //     ]);

    //     notify()->success('Payroll created successfully.');
    //     return redirect()->route('manageEmployee.ViewEmployee');
    // }

    // public function showPayroll($employeeId, $payrollId)
    // {
    //     $payroll = Payroll::where('user_id', $employeeId)->findOrFail($payrollId);
    //     return view('admin.pages.manageEmployee.viewPayroll', compact('payroll'));
    // }
}
