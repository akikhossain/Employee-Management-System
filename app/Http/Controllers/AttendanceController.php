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
        $attendances = Attendance::paginate(10);
        return view('admin.pages.attendance.viewAttendance', compact('attendances'));
    }

    public function checkIn(Request $request)
    {
        // Get the date from the form (either the selected date or today's date)
        $selectedDate = $request->input('attendance_date') ?? now()->toDateString();

        // Get the current time for calculating late attendance
        $currentTime = now();
        $nineAm = Carbon::createFromTime(9, 0, 0);
        $currentMonth = Carbon::now()->monthName;

        // Check if the attendance for the selected date already exists
        $existingAttendance = Attendance::where('employee_id', auth()->user()->id)
            ->whereDate('select_date', $selectedDate)
            ->first();

        if ($existingAttendance) {
            // Attendance for this date already exists, show error message
            notify()->error('Attendance already given for the selected date.');
            return redirect()->back();
        }

        // Check if the user is late (only for current date)
        $late = null;
        if ($selectedDate == now()->toDateString() && $currentTime->greaterThan($nineAm)) {
            $late = $currentTime->diff($nineAm)->format('%H:%I:%S');
        }

        // Create the attendance record for the selected date
        Attendance::create([
            'employee_id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'department_name' => optional(auth()->user()->employee->department)->department_name ?? 'Not specified',
            'designation_name' => optional(auth()->user()->employee->designation)->designation_name ?? 'Not specified',
            'check_in' => $currentTime->format('H:i:s'),
            'check_out' => null,
            'select_date' => $selectedDate,
            'month' => $currentMonth,
            'late' => $late, // Save late time if applicable
        ]);

        notify()->success(message: 'Attendance given successfully for ' . $selectedDate);
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
            $regularWorkingHours = $checkInTime->copy()->setTime(17, 0, 0);

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


    // Delete Attendance
    public function attendanceDelete($id)
    {
        $attendance =  Attendance::find($id);
        if ($attendance) {
            $attendance->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }


    public function myAttendance()
    {
        $userId = auth()->user()->id;

        // Retrieve leave records for the authenticated user only
        $attendances = Attendance::where('employee_id', $userId)
            ->paginate(10);
        return view('admin.pages.attendance.myAttendance', compact('attendances'));
    }

    // report of all attendance record
    public function attendanceReport()
    {
        $attendances = Attendance::paginate(10);
        return view('admin.pages.attendance.attendanceReport', compact('attendances'));
    }

    // report  of my attendance
    public function myAttendanceReport()
    {
        $userId = auth()->user()->id;

        // Retrieve leave records for the authenticated user only
        $attendances = Attendance::where('employee_id', $userId)
            ->paginate(10);
        return view('admin.pages.attendance.myAttendanceReport', compact('attendances'));
    }


    // search for all attendance list
    public function searchAttendanceReport(Request $request)
    {
        $searchTerm = $request->search;

        $query = Attendance::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('department_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('designation_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('select_date', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('month', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        $attendances = $query->paginate(10);
        return view('admin.pages.attendance.viewSearchAttendance', compact('attendances'));
    }

    // search  my attendance
    public function searchMyAttendance(Request $request)
    {
        $userId = auth()->user()->id;
        $searchTerm = $request->search;

        $query = Attendance::where('employee_id', $userId);

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('department_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('designation_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('select_date', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('month', 'LIKE', '%' . $searchTerm . '%');
                // Add more conditions based on your search requirements
            });
        }

        $attendances = $query->paginate(10);

        return view('admin.pages.attendance.searchMyAttendance', compact('attendances'));
    }
}
