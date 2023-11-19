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

            notify()->error($validate->getMessageBag());
            return redirect()->back();

            // return redirect()->back()->withErrors($validate);
        }

        Department::create([
            'department_name' => $request->department_name,
            'department_id' => $request->department_id,
        ]);
        notify()->success('New Department created successfully.');
        return redirect()->back();
    }
    public function delete($id)
    {
        $department = Department::find($id);
        if ($department) {
            $department->delete();
        }
        notify()->success('Department Deleted Successfully.');
        return redirect()->back();
    }
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.pages.Organization.Department.editDepartment', compact('department'));
    }
    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        if ($department) {

            // $fileName = $employee->image;
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            //     $file->storeAs('/uploads', $fileName);
            // }

            $department->update([
                'department_name' => $request->department_name,
                'department_id' => $request->department_id,
            ]);

            notify()->success('Your information updated successfully.');
            return redirect()->route('organization.department');
        }
    }
}
