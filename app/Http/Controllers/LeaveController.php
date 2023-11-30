<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
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
        $leaves = Leave::with(['type'])->paginate(5);
        return view('admin.pages.Leave.myLeave', compact('leaves'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'employee_name' => 'required',
            'employee_id' => 'required',
            'department' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
            'leave_type_id' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {

            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }
        Leave::create([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'department' => $request->department,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'leave_type_id' => $request->leave_type_id,
            'description' => $request->description,
        ]);
        notify()->success('New Leave created');
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
}
