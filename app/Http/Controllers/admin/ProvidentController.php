<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProvidentController extends Controller
{
    public function providentList(Request $request)
    {
        // Default provident fund percentage
        $pfPercentage = $request->input('pf_percentage', 10); // Default is 10% if not provided

        // Get the list of employees with their designation, department, and total Provident Fund
        $employees = DB::table('employees')
            ->leftJoin('designations', 'employees.designation_id', '=', 'designations.id')
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
            ->leftJoin('payrolls', 'employees.id', '=', 'payrolls.employee_id')
            ->select(
                'employees.id as employee_id',
                'employees.name as employee_name',
                'designations.designation_name',
                'departments.department_name',
                DB::raw('SUM(payrolls.total_payable) as total_salary'),
                DB::raw('SUM(
                    CASE
                        WHEN DATE_ADD(employees.hire_date, INTERVAL 6 MONTH) <= payrolls.date
                        THEN payrolls.total_payable * ' . $pfPercentage . ' / 100
                        ELSE 0
                    END
                ) as total_provident_fund')
            )
            ->groupBy(
                'employees.id',
                'employees.name',
                'designations.designation_name',
                'departments.department_name'
            )
            ->paginate(10);

        return view('admin.provident.list', compact('employees', 'pfPercentage'));
    }


    public function employeeProvident()
    {
        // Get the logged-in user's employee ID
        $employee = Auth::user()->employee;

        if (!$employee) {
            return redirect()->back()->with('error', 'No associated employee record found.');
        }

        // Default provident fund percentage
        $providentFundPercentage = 10; // 10% default

        // Get all payroll records for the employee
        $payrolls = $employee->payrolls()
            ->where('date', '>=', Carbon::parse($employee->hire_date)->addMonths(6))
            ->select('month', 'year', 'total_payable')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Calculate the provident fund for each payroll record
        $providentFunds = [];
        $totalProvidentFund = 0;

        foreach ($payrolls as $payroll) {
            $monthlyProvidentFund = $payroll->total_payable * $providentFundPercentage / 100;
            $providentFunds[] = [
                'month' => $payroll->month,
                'year' => $payroll->year,
                'total_payable' => $payroll->total_payable, // Add this line
                'provident_fund' => $monthlyProvidentFund,
            ];
            $totalProvidentFund += $monthlyProvidentFund;
        }

        return view('admin.provident.employee', compact('employee', 'providentFunds', 'totalProvidentFund'));
    }
}
