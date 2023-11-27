<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function attendance()
    {
        return view('admin.pages.attendance.addAttendance',);
    }
    public function giveAttendance()
    {
        $employees = Employee::all();
        return view('admin.pages.attendance.attendance', compact('employees'));
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
            'department' => $request->department,
            'select_date' => $request->select_date,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);
        notify()->success('Attendance given successfully');
        return redirect()->back();
    }

    public function checkIn()
    {
        $existingAttendance = Attendance::where('employee_id', auth()->user()->id)
            ->whereDate('select_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            notify()->error('Attendance already given');
            return redirect()->back();
        }
        Attendance::create([
            'employee_id' => auth()->user()->id,
            'check_in' =>  now(),
            'check_out' => null,
            'select_date' => now(),
        ]);
        notify()->success('Attendance given successfully');
        return redirect()->back();
    }

    public function checkOut()
    {
    }
}
