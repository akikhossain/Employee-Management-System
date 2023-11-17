<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        $employees = Employee::all();
        return view('admin.pages.attendance.addAttendance', compact('employees'));
    }
    public function attendanceList()
    {
        $attendances = Attendance::with(['employee'])->paginate(8);
        return view('admin.pages.attendance.viewAttendance', compact('attendances'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Attendance::create([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'designation' => $request->designation,
            'select_date' => $request->select_date,
            'sign_in' => $request->sign_in,
            'sign_out' => $request->sign_out,
            'hours' => $request->hours,
        ]);
        notify()->success('Attendance given successfully');
        return redirect()->back();
    }
}
