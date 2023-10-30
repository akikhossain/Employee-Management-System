<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('admin.pages.attendance.addAttendance');
    }
    public function attendanceList()
    {
        $attendances = Attendance::paginate(5);
        return view('admin.pages.attendance.viewAttendance', compact('attendances'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Attendance::create([
            'employee_name' => $request->employee_name,
            'select_date' => $request->select_date,
            'sign_in' => $request->sign_in,
            'sign_out' => $request->sign_out,
        ]);
        return redirect()->route('attendance.viewAttendance');
    }
}
