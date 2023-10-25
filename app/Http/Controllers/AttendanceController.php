<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('admin.pages.attendance.addAttendance');
    }
    public function attendanceList()
    {
        return view('admin.pages.attendance.viewAttendance');
    }
}
