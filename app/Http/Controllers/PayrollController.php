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
        // Fetch employees and salary structures for dropdowns
        $employees = Employee::all();
        $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get();

        // Get the employee ID from the request
        $employeeId = $request->input('employee_id');

        // Get the total duration for the selected employee
        $totalDuration = Attendance::where('employee_id', $employeeId)
            ->select(DB::raw('SUM(duration_minutes) as total_duration'))
            ->groupBy('employee_id')
            ->first();

        // Convert total duration in minutes to hours
        $totalHours = $totalDuration ? round($totalDuration->total_duration / 60, 2) : 0;

        return view('admin.pages.Payroll.createPayroll', compact('employees', 'salaryStructures', 'totalHours'));
    }



    public function payrollStore(Request $request)
    {
        // Validate request data
        $validate = Validator::make($request->all(), [
            'employee_id' => 'required',
            'salary_structure_id' => 'required',
            'total_hours' => 'required',
            'deduction' => 'required',
        ]);

        if ($validate->fails()) {
            // Handle validation errors, like displaying errors and redirecting back
            return redirect()->back()->withErrors($validate)->withInput();
        }

        // Calculate total hours from attendance records
        $totalHours = $request->input('total_hours');


        $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);

        // Deduction values
        $deductionValues = [
            'income_tax' => 100,
            'health_insurance' => 50,
            'child_support' => 75,
            'no_deduction' => 0,
        ];

        // Retrieve selected deduction or default to 0
        $selectedDeduction = $request->deduction;
        $deduction = $deductionValues[$selectedDeduction] ?? 0;

        // Calculate total payable
        $totalPayable = $salaryStructure->total_salary - $deduction;

        // Create a new payroll record
        Payroll::create([
            'employee_id' => $request->employee_id,
            'salary_structure_id' => $request->salary_structure_id,
            'total_hours' => $totalHours,
            'deduction' => $deduction,
            'total_payable' => $totalPayable,
        ]);

        return redirect()->route('payroll.view')->with('success', 'Payroll created successfully.');
    }

    public function viewPayroll()
    {
        // Retrieve all payrolls with associated employee and salary structure
        $payrolls = Payroll::with(['employee', 'salaryStructure'])->get();
        return view('admin.pages.Payroll.payrollList', compact('payrolls'));
    }
}
