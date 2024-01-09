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
use Laravel\Sail\Console\PublishCommand;

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

        $salaryStructure = SalaryStructure::findOrFail($request->salary_structure_id);
        $deduction = $request->input('deduction');
        $totalPayable = $salaryStructure->total_salary - $deduction;

        // Check if deduction is greater than total payable
        if ($deduction > $salaryStructure->total_salary) {
            notify()->error('Deduction cannot be greater than the total payable amount.');
            return redirect()->back();
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

            if ($employee) {
                $employee->load('designation', 'department'); // Assuming relationships in Employee model

                if ($employee->designation) {
                    $payroll->designation = $employee->designation->name;
                } else {
                    $payroll->designation = 'Unknown'; // Placeholder if designation is missing
                }

                if ($employee->department) {
                    $payroll->department = $employee->department->name;
                } else {
                    $payroll->department = 'Unknown'; // Placeholder if department is missing
                }
            } else {
                $payroll->designation = 'Employee not found'; // Placeholder for missing employee
                $payroll->department = 'Employee not found'; // Placeholder for missing employee
            }
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

            if ($employee) {
                $employee->load('designation', 'department');

                $payroll->designation = optional($employee->designation)->name;
                $payroll->department = optional($employee->department)->name;
            } else {
                // Handle the case where the employee is not found
                $payroll->designation = null;
                $payroll->department = null;
            }
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

            if ($deduction > $salaryStructure->total_salary) {
                notify()->error('Deduction cannot be greater than the total payable amount.');
                return redirect()->back();
            }

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

    // my payroll list
    public function singlePayroll($employeeId, $month)
    {
        $employeePayrolls = Payroll::where('employee_id', $employeeId)
            ->where('month', $month)
            ->orderBy('date', 'asc')
            ->get();

        $employee = $employeePayrolls->first()->employee;
        $employee->load('designation', 'department');

        return view('admin.pages.Payroll.singlePayrollList', compact('employeePayrolls', 'employee'));
    }


    // report all payroll list
    public function allPayroll()
    {
        $payrolls = Payroll::with(['employee', 'salaryStructure'])->get();
        $payrolls->each(function ($payroll) {
            $employee = $payroll->employee;

            if ($employee) {
                $employee->load('designation', 'department'); // Assuming relationships in Employee model

                if ($employee->designation) {
                    $payroll->designation = $employee->designation->name;
                } else {
                    $payroll->designation = 'Unknown'; // Placeholder if designation is missing
                }

                if ($employee->department) {
                    $payroll->department = $employee->department->name;
                } else {
                    $payroll->department = 'Unknown'; // Placeholder if department is missing
                }
            } else {
                $payroll->designation = 'Employee not found'; // Placeholder for missing employee
                $payroll->department = 'Employee not found'; // Placeholder for missing employee
            }
        });

        return view('admin.pages.Payroll.allPayrollList', compact('payrolls'));
    }



    // my payroll report

    public function mySingle($employeeId, $month)
    {
        $employee = Employee::with(['department', 'designation'])->findOrFail($employeeId);

        $employeePayrolls = Payroll::with(['employee.department', 'employee.designation', 'salaryStructure'])
            ->where('employee_id', $employeeId)
            ->where('month', $month)
            ->get();

        return view('admin.pages.Payroll.mySinglePayroll', compact('employee', 'employeePayrolls'));
    }




    // search my payroll
    public function searchMyPayroll(Request $request)
    {
        $employee = Auth::user()->employee;

        if (!$employee) {
            abort(403, 'Unauthorized action.');
        }

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $payrolls = Payroll::with(['employee', 'salaryStructure'])
                ->where('employee_id', $employee->id)
                ->where(function ($query) use ($searchTerm) {
                    $query->where('employee_id', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('year', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('salary_structure_id', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('deduction', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('total_payable', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('reason', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('year', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('month', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('month', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('date', 'LIKE', '%' . $searchTerm . '%');
                })
                ->get();
        } else {
            $payrolls = Payroll::with(['employee', 'salaryStructure'])
                ->where('employee_id', $employee->id)
                ->get();
        }

        $payrolls->each(function ($payroll) {
            $employee = $payroll->employee;
            $employee->load('designation', 'department'); // Assuming you have relationships defined in Employee model
            $payroll->designation = $employee->designation->name;
            $payroll->department = $employee->department->name;
        });

        return view('admin.pages.Payroll.searchMyPayrollList', compact('payrolls'));
    }

    // search all payroll list
    public function searchAllPayroll(Request $request)
    {
        $searchTerm = $request->search;
        $payrollsQuery = Payroll::with(['employee', 'salaryStructure']);

        if ($searchTerm) {
            $payrollsQuery->where(function ($query) use ($searchTerm) {
                $query->where('month', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('year', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('deduction', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('reason', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereHas('employee', function ($employeeQuery) use ($searchTerm) {
                        $employeeQuery->where('name', 'LIKE', '%' . $searchTerm . '%')
                            ->orWhereHas('department', function ($departmentQuery) use ($searchTerm) {
                                $departmentQuery->where('department_name', 'LIKE', '%' . $searchTerm . '%');
                            })
                            ->orWhereHas('designation', function ($designationQuery) use ($searchTerm) {
                                $designationQuery->where('designation_name', 'LIKE', '%' . $searchTerm . '%');
                            });
                    });
            });
        }

        $payrolls = $payrollsQuery->get();

        $foundCount = $payrolls->count();

        return view('admin.pages.Payroll.searchAllPayrollList', compact('payrolls', 'foundCount'));
    }
}
