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
    public function createPayroll(Request $request)
    {
        $employees = Employee::all();
        $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get();
        // $currentMonth = now()->month;
        // $currentYear = now()->year;

        // foreach ($employees as $employee) {
        //     $attendances = Attendance::where('employee_id', $employee->id)
        //         ->whereYear('select_date', $currentYear)
        //         ->whereMonth('select_date', $currentMonth)
        //         ->get();

        //     $totalDurationHours = 0;
        //     $totalOvertimeHours = 0;

        //     foreach ($attendances as $attendance) {
        //         $totalDurationMinutes = is_numeric($attendance->duration_minutes) ? $attendance->duration_minutes : 0;

        // Convert overtime from HH:MM:SS to decimal hours
        //         if ($attendance->overtime) {
        //             list($hours, $minutes, $seconds) = explode(':', $attendance->overtime);
        //             $totalOvertimeHours += $hours + ($minutes / 60) + ($seconds / 3600);
        //         }

        //         $totalDurationHours += $totalDurationMinutes / 60;
        //     }

        //     $employee->totalDurationHours = round($totalDurationHours, 2);
        //     $employee->totalOvertimeHours = round($totalOvertimeHours, 2);
        // }

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
        $payrolls->each(function ($payroll) {
            $employee = $payroll->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $payroll->designation = $employee->designation->name;
            $payroll->department = $employee->department->name;
        });
        return view('admin.pages.Payroll.payrollList', compact('payrolls'));
    }

    public function myPayroll()
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Unauthorized action.');
        }

        $payrolls = Payroll::with(['employee', 'salaryStructure'])
            ->where('employee_id', $employee->id)
            ->get();

        $payrolls->each(function ($payroll) {
            $employee = $payroll->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $payroll->designation = $employee->designation->name;
            $payroll->department = $employee->department->name;
        });

        return view('admin.pages.Payroll.myPayrollList', compact('payrolls'));
    }


    // delete  update edit payroll

    // delete
    public function deletePayroll($id)
    {
        $payroll = Payroll::find($id);
        if ($payroll) {
            $payroll->delete();
            notify()->success('Payroll Deleted Successfully.');
        } else {
            notify()->error('Payroll Not Found.');
        }
        return redirect()->back();
    }

    // edit
    public function payrollEdit($id)
    {
        $payroll = Payroll::find($id);
        $employees = Employee::all();
        $salaryStructures = SalaryStructure::select('id', 'total_salary', 'salary_class')->get();
        return view('admin.pages.Payroll.editPayroll', compact('payroll', 'employees', 'salaryStructures'));
    }


    // update
    public function payrollUpdate(Request $request, $id)
    {
        $payroll = Payroll::find($id);
        if ($payroll) {

            $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);
            $deduction = $request->input('deduction');
            $totalPayable = $salaryStructure->total_salary - $deduction;

            $payroll->update([
                'employee_id' => $request->employee_id,
                'salary_structure_id' => $request->salary_structure_id,
                'deduction' => $deduction,
                'reason' => $request->input('reason'),
                'total_payable' => $totalPayable,
                'year' => $request->input('year'),
                'month' => $request->input('month'),
                'date' => now(),
            ]);

            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }

    // Single Payroll
    public function singlePayroll($id)
    {
        // dd($id);
        $employee = Employee::with(['department', 'designation'])->findOrFail($id);
        $employeePayrolls = Payroll::with(['employee.department', 'employee.designation', 'salaryStructure'])
            ->where('employee_id', $id)
            ->get();

        return view('admin.pages.Payroll.singlePayrollList', compact('employee', 'employeePayrolls'));
    }

    // report all payroll list
    public function allPayroll()
    {
        $payrolls = Payroll::with(['employee', 'salaryStructure'])->get();
        $payrolls->each(function ($payroll) {
            $employee = $payroll->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $payroll->designation = $employee->designation->name;
            $payroll->department = $employee->department->name;
        });
        return view('admin.pages.Payroll.allPayrollList', compact('payrolls'));
    }
}
