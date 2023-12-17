<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function designation()
    {
        $designations = Designation::all();
        return view('admin.pages.Organization.Designation.designation', compact('designations'));
    }

    public function designationStore(Request $request)
    {
        // dd($request->all());

        $validate = Validator::make($request->all(), [
            'designation_name' => 'required',
            'designation_id' => 'required',
            'salary' => 'required',
        ]);

        if ($validate->fails()) {

            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        Designation::create([
            'designation_name' => $request->designation_name,
            'designation_id' => $request->designation_id,
            'salary' => $request->salary,
        ]);
        notify()->success('New Designation created successfully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $department = Designation::find($id);
        if ($department) {
            $department->delete();
        }
        notify()->success('Designation Deleted Successfully');
        return redirect()->back();
    }
    public function edit($id)
    {
        $department = Designation::find($id);
        return view('admin.pages.Organization.Designation.editDesignation', compact('department'));
        // $designation = Designation::find($id);
        // return view('admin.pages.Organization.Designation.editDesignation', compact('designation'));
    }
    public function update(Request $request, $id)
    {

        $designation = Designation::find($id);
        if ($designation) {

            // $fileName = $employee->image;
            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            //     $file->storeAs('/uploads', $fileName);
            // }

            $designation->update([
                'designation_name' => $request->designation_name,
                'designation_id' => $request->designation_id,
                'salary' => $request->salary,
            ]);

            notify()->success('Updated successfully.');
            return redirect()->route('organization.designation');
        }
    }
}
