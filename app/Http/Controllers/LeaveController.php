<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{

    public function leave()
    {
        $leaves = Leave::all();
        return view('admin.pages.Leave.leaveForm', compact('leaves'));
    }
    public function leaveList()
    {
        $leaves = Leave::paginate(5);
        return view('admin.pages.Leave.leaveList', compact('leaves'));
    }


    public function myLeave()
    {
        $leaves = Leave::paginate(5);
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
            'leave_type' => 'required',
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
            'leave_type' => $request->leave_type,
            'description' => $request->description,
        ]);
        notify()->success('New Leave created');
        return redirect()->back();
    }
}
