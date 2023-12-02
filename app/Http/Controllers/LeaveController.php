<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{

    public function leave()
    {
        $leaves = Leave::all();
        $leaveTypes = LeaveType::all();
        return view('admin.pages.Leave.leaveForm', compact('leaves', 'leaveTypes'));
    }
    public function leaveList()
    {
        $leaves = Leave::with(['type'])->paginate(5);
        return view('admin.pages.Leave.leaveList', compact('leaves'));
    }


    public function myLeave()
    {
        $userId = auth()->user()->id;

        // Retrieve leave records for the authenticated user only
        $leaves = Leave::where('employee_id', $userId)
            ->with(['type'])
            ->paginate(5);

        return view('admin.pages.Leave.myLeave', compact('leaves'));
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',
            'leave_type_id' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        $fromDate = Carbon::parse($request->from_date);
        $toDate = Carbon::parse($request->to_date);
        $totalDays = $toDate->diffInDays($fromDate) + 1; // Calculate total days

        // Fetch the total days for the selected leave type ('leave_days' column)
        $leaveType = LeaveType::findOrFail($request->leave_type_id);
        $leaveTypeTotalDays = $leaveType->leave_days; // Assuming 'leave_days' is the field in the LeaveType model

        // Validate if the total days taken for this leave type don't exceed the available days
        $userId = auth()->user()->id;
        $totalTakenDaysForLeaveType = Leave::where('employee_id', $userId)
            ->where('leave_type_id', $request->leave_type_id)
            ->whereYear('from_date', '=', date('Y'))
            ->sum('total_days');

        $availableLeaveDays = $leaveTypeTotalDays - $totalTakenDaysForLeaveType;

        if ($totalDays > $availableLeaveDays) {
            notify()->error('Exceeded available leave days for this type.');
            return redirect()->back();
        }

        Leave::create([
            'employee_name' => auth()->user()->name,
            'employee_id' => auth()->user()->id,
            'from_date' => $fromDate,
            'to_date' => $toDate,
            'total_days' => $totalDays,
            'leave_type_id' => $request->leave_type_id,
            'description' => $request->description,
        ]);

        notify()->success('New Leave created');
        return redirect()->back();
    }





    // Approve and Reject Leave
    public function approveLeave($id)
    {
        $leave = Leave::find($id);
        $leave->status = 'approved'; // Assuming 'status' is a field in your 'leaves' table
        $leave->save();

        notify()->success('Leave approved');
        return redirect()->back();
    }

    public function rejectLeave($id)
    {
        $leave = Leave::find($id);
        $leave->status = 'rejected'; // Assuming 'status' is a field in your 'leaves' table
        $leave->save();

        notify()->error('Leave rejected');
        return redirect()->back();
    }



    // Leave Type
    public function leaveType()
    {
        $leaveTypes = LeaveType::all();
        return view('admin.pages.leaveType.formList', compact('leaveTypes'));
    }

    public function leaveStore(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'leave_type_id' => 'required|string',
            'leave_days' => 'required|integer|min:0',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->errors()->first()); // Retrieving the first validation error message
            return redirect()->back();
        }

        LeaveType::create([
            'leave_type_id' => $request->leave_type_id,
            'leave_days' => $request->leave_days,
        ]);

        notify()->success('New Leave Type created successfully.');
        return redirect()->back();
    }



    // edit, delete, update LeaveType


    public function LeaveDelete($id)
    {
        $leaveType = LeaveType::find($id);
        if ($leaveType) {
            $leaveType->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }
    public function leaveEdit($id)
    {
        $leaveType = LeaveType::find($id);
        return view('admin.pages.leaveType.editList', compact('leaveType'));
    }
    public function LeaveUpdate(Request $request, $id)
    {
        $leaveType = LeaveType::find($id);
        if ($leaveType) {

            $leaveType->update([
                'leave_type_id' => $request->leave_type_id,
                'leave_days' => $request->leave_days,
            ]);

            notify()->success('Your information updated successfully.');
            return redirect()->route('leave.leaveType');
        }
    }


    // leave Balance

    public function showLeaveBalance()
    {
        $userId = auth()->user()->id;

        $leaves = Leave::where('employee_id', $userId)
            ->whereYear('from_date', '=', date('Y'))
            ->with('type')
            ->get();

        $leaveTypeBalances = [];
        $totalTakenDays = 0; // Variable to track total taken days across all leave types

        foreach ($leaves as $leave) {
            $leaveType = $leave->type->leave_type_id;
            $leaveLimit = $leave->type->leave_days; // Retrieve leave days from LeaveType model

            if (!isset($leaveTypeBalances[$leaveType])) {
                $leaveTypeBalances[$leaveType] = [
                    'totalDays' => $leaveLimit,
                    'takenDays' => 0,
                    'availableDays' => $leaveLimit,
                ];
            }

            // Check if leave request is approved before updating taken and available days
            if ($leave->status === 'approved') {
                $leaveTypeBalances[$leaveType]['takenDays'] += $leave->total_days;
                $leaveTypeBalances[$leaveType]['availableDays'] -= $leave->total_days;

                $totalTakenDays += $leave->total_days; // Increment total taken days
            }
        }

        return view('admin.pages.Leave.myLeaveBalance', compact('leaveTypeBalances', 'totalTakenDays'));
    }
}
