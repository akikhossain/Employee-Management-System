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

        $userId = Auth::id();
        $employee = Employee::where('user_id', $userId)->first();

        $totalHours = 0; // Set a default value for total hours

        if ($employee) {
            $totalDuration = Attendance::where('employee_id', $employee->id)
                ->sum('duration_minutes');
            $totalHours = round($totalDuration / 60, 2);
        }
        return view('admin.pages.Payroll.createPayroll', compact('employees', 'salaryStructures', 'totalHours'));
    }


    public function payrollStore(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'employee_id' => 'required',
            'salary_structure_id' => 'required',
            'total_hours' => 'required',
            'deduction' => 'required',
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $totalHours = $request->input('total_hours');
        $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);

        // Deduction values
        $deductionValues = [
            'income_tax' => 100,
            'health_insurance' => 50,
            'child_support' => 75,
            'no_deduction' => 0,
        ];

        $selectedDeduction = $request->deduction;
        $deduction = $deductionValues[$selectedDeduction] ?? 0;
        $totalPayable = $salaryStructure->total_salary - $deduction;

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
        $payrolls = Payroll::with(['employee', 'salaryStructure'])->get();
        return view('admin.pages.Payroll.payrollList', compact('payrolls'));
    }
}
