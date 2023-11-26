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
        // $attendance = new Attendance();
        // $attendance->employee_id = auth()->user()->id;
        // $attendance->check_in = Carbon::now();
        // $attendance->date = Carbon::today();
        // $attendance->save();

        // return redirect()->back();
    }

    public function checkOut()
    {
        // $attendance = Attendance::where('employee_id', auth()->user()->id)
        //     ->whereDate('date', Carbon::today())
        //     ->first();

        // if ($attendance) {
        //     $attendance->check_out = Carbon::now();
        //     $attendance->save();
        // }

        // return redirect()->back();
    }
}
