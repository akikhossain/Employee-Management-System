<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PayrollController extends Controller
{
    // public function createPayroll()
    // {
    //     // Fetch employees and salary structures for dropdowns
    //     $employees = Employee::all();
    //     $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get();

    //     return view('admin.pages.Payroll.createPayroll', compact('employees', 'salaryStructures'));
    // }


    public function createPayroll(Request $request)
    {
        $employees = Employee::all();
        $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get();
        return view('admin.pages.Payroll.createPayroll', compact('employees', 'salaryStructures'));
    }


    public function payrollStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'employee_id' => 'required',
            'salary_structure_id' => 'required',
            'deduction' => 'required|numeric',
            'year' => 'required',
            'month' => 'required',
            'reason' => 'nullable|string',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Check for duplicate entry
        $existingPayroll = Payroll::where('employee_id', $request->employee_id)
            ->where('month', $request->month)
            ->where('year', $request->year)
            ->first();
        if ($existingPayroll) {
            notify()->error('Already Employee Payroll Exist');
            return redirect()->back();
        }
        $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);
        $deduction = $request->input('deduction');
        $totalPayable = $salaryStructure->total_salary - $deduction;

        Payroll::create([
            'employee_id' => $request->employee_id,
            'salary_structure_id' => $request->salary_structure_id,
            'deduction' => $deduction,
            'reason' => $request->input('reason'),
            'total_payable' => $totalPayable,
            'year' => $request->input('year'),
            'month' => $request->input('month'),
            'date' => now(),
        ]);
        notify()->success('Payroll created successfully.');

        return redirect()->route('payroll.view');
    }


    public function viewPayroll()
    {
        $payrolls = Payroll::with(['employee', 'salaryStructure'])->get();
        return view('admin.pages.Payroll.payrollList', compact('payrolls'));
    }

    public function myPayroll()
    {
        $employee = Auth::user()->employee;
        if (!$employee) {
            abort(403, 'Unauthorized action');
        }
        $payrolls = Payroll::with(['employee', 'salaryStructure'])
            ->where('employee_id', $employee->id)
            ->get();
        return view('admin.pages.Payroll.myPayrollList', compact('payrolls'));
    }
}
