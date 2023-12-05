<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PayrollController extends Controller
{
    public function createPayroll()
    {
        // Fetch employees and salary structures for dropdowns
        $employees = Employee::all();
        $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get(); // Select only the required columns

        return view('admin.pages.Payroll.createPayroll', compact('employees', 'salaryStructures'));
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

            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        // Calculate total hours from attendance records
        $totalHours = Attendance::where('employee_id', $request->employee_id)
            ->whereDate('select_date', now()->toDateString())
            ->sum('duration');
        $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);


        $deductionValues = [
            'income_tax' => 100,
            'health_insurance' => 50,
            'child_support' => 75,
            'no_deduction' => 0,
        ];
        $selectedDeduction = $request->deduction;
        $deduction = $deductionValues[$selectedDeduction] ?? 0;

        // Calculate total payable
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
