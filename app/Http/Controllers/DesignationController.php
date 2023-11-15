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

            // notify()->error($validate->getMessageBag());
            // return redirect()->back();

            return redirect()->back()->withErrors($validate);
        }

        Designation::create([
            'designation_name' => $request->designation_name,
            'designation_id' => $request->designation_id,
            'salary' => $request->salary,
        ]);

        return redirect()->back();
    }
}
