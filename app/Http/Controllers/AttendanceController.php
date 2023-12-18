<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function giveAttendance()
    {

        return view('admin.pages.attendance.attendance');
    }
    public function attendanceList()
    {
        $attendances = Attendance::paginate(3);
        return view('admin.pages.attendance.viewAttendance', compact('attendances'));
    }

    public function checkIn()
    {
        $currentTime = now();
        $nineAm = Carbon::createFromTime(9, 0, 0); // 9 AM
        $fivePm = Carbon::createFromTime(17, 0, 0); // 5 PM

        if ($currentTime->greaterThan($fivePm)) {
            // Outside working hours, can't check in
            notify()->error('You cannot check-in after 5 PM.');
            return redirect()->back();
        }

        if ($currentTime->lessThan($nineAm)) {
            // Outside working hours, can't check in yet
            notify()->error('You can check-in after 9 AM.');
            return redirect()->back();
        }

        $existingAttendance = Attendance::where('employee_id', auth()->user()->id)
            ->whereDate('select_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            notify()->error('Attendance already given.');
            return redirect()->back();
        }

        $late = $currentTime->diff($nineAm)->format('%H:%I:%S');

        Attendance::create([
            'employee_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'check_in' => $currentTime->format('H:i:s'),
            'check_out' => null,
            'select_date' => now(),
            'late' => $late, // Save late time
        ]);

        notify()->success('Attendance given successfully.');
        return redirect()->back();
    }


    public function checkOut()
    {
        $existingAttendance = Attendance::where('employee_id', auth()->user()->id)
            ->whereDate('select_date', now()->toDateString())
            ->first();

        if ($existingAttendance) {
            $checkInTime = Carbon::createFromTimeString($existingAttendance->check_in);
            $checkOutTime = now();
            $regularWorkingHours = $checkInTime->copy()->setTime(17, 0, 0); // Assuming 5 PM as regular working hours

            // Calculate overtime
            $overtime = $checkOutTime->diff($regularWorkingHours)->format('%H:%I:%S');

            if ($checkOutTime->greaterThan($regularWorkingHours)) {
                // If checked out after regular working hours, calculate overtime
                $existingAttendance->update([
                    'overtime' => $overtime,
                ]);

                notify()->info("Overtime: $overtime");
            } else {
                // If checked out within regular working hours, no overtime
                $existingAttendance->update([
                    'overtime' => null,
                ]);
            }

            if ($existingAttendance->check_out !== null) {
                notify()->error('You have already checked out for today.');
                return redirect()->back();
            }

            $existingAttendance->update([
                'check_out' => $checkOutTime->format('H:i:s'),
            ]);

            // Calculate duration and store it
            $duration = $checkOutTime->diffInMinutes($checkInTime);
            $existingAttendance->update([
                'duration_minutes' => $duration,
            ]);

            notify()->success('You have checked out successfully.');
        } else {
            notify()->error('No check-in found for today.');
        }

        return redirect()->back();
    }


    public function myAttendance()
    {
        $userId = auth()->user()->id;

        // Retrieve leave records for the authenticated user only
        $attendances = Attendance::where('employee_id', $userId)
            ->paginate(3);
        return view('admin.pages.attendance.myAttendance', compact('attendances'));
    }
}
