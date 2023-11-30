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
            'name' => auth()->user()->name,
            'check_in' => now()->format('H:i:s'),
            'check_out' => null,
            'select_date' => now(),
        ]);
        notify()->success('Attendance given successfully');
        return redirect()->back();
    }

    public function checkOut()
    {
        $existingAttendance = Attendance::where('employee_id', auth()->user()->id)
            ->whereDate('select_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            if ($existingAttendance->check_out !== null) {
                notify()->error('You have already checked out for today.');
                return redirect()->back();
            }

            $existingAttendance->update([
                'check_out' => now()->format('H:i:s'),
            ]);

            // Calculate duration and store it
            $checkInTime = \Carbon\Carbon::createFromTimeString($existingAttendance->check_in);
            $checkOutTime = \Carbon\Carbon::createFromTimeString($existingAttendance->check_out);
            $duration = $checkOutTime->diff($checkInTime)->format('%H:%I:%S');

            $existingAttendance->update([
                'duration' => $duration,
            ]);


            notify()->success('You have Check-out successfully.');
        } else {
            notify()->error('No check-in found for today.');
        }

        return redirect()->back();
    }
}
