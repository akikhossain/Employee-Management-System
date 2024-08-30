<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProvidentController extends Controller
{
    public function providentList(Request $request)
    {
        // Default provident fund percentage
        $pfPercentage = $request->input('pf_percentage', 10); // Default is 10% if not provided

        // Get the current date
        $currentDate = Carbon::now();

        // Get the list of employees with their designation, department, and salary
        $employees = DB::table('employees')
            ->leftJoin('designations', 'employees.designation_id', '=', 'designations.id')
            ->leftJoin('departments', 'employees.department_id', '=', 'departments.id')
            ->leftJoin('salary_structures', 'employees.salary_structure_id', '=', 'salary_structures.id')
            ->select(
                'employees.id as employee_id',
                'employees.name as employee_name',
                'designations.designation_name',
                'departments.department_name',
                'salary_structures.total_salary',
                'employees.hire_date',
                DB::raw(
                    '
                    CASE
                        WHEN DATE_ADD(employees.hire_date, INTERVAL 6 MONTH) <= NOW()
                        THEN salary_structures.basic_salary * ' . $pfPercentage . ' / 100
                        ELSE 0
                    END as total_provident_fund'
                )
            )
            ->get();

        return view('admin.provident.list', compact('employees', 'pfPercentage'));
    }
}
