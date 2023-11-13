<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    public function department()
    {
        $departments = Department::all();
        return view('admin.pages.Organization.Department.department', compact('departments'));
    }
    // public function departmentList()
    // {
    //     $departments = Department::all();
    //     return view('admin.pages.Organization.Department.department', compact('departments'));
    // }
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'department_name' => 'required',
            'department_id' => 'required',
        ]);

        if ($validate->fails()) {

            // notify()->error($validate->getMessageBag());
            // return redirect()->back();

            return redirect()->back()->withErrors($validate);
        }

        Department::create([
            'department_name' => $request->department_name,
            'department_id' => $request->department_id,
        ]);

        return redirect()->back();
    }
}
