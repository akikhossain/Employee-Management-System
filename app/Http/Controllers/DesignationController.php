<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\SalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignationController extends Controller
{
    public function designation()
    {

        $departments  =  Department::all();
        $salaries  =  SalaryStructure::all();
        return view('admin.pages.Organization.Designation.designation', compact('departments', 'salaries'));
    }

    public function designationStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'designation_name' => 'required',
            'designation_id' => 'required',
            'salary_structure_id' => 'required|exists:salary_structures,id',
            'department_id' => 'required|exists:departments,id', // Validate department_id
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        Designation::create([
            'designation_name' => $request->designation_name,
            'designation_id' => $request->designation_id,
            'department_id' => $request->department_id, // Assign department_id
            'salary_structure_id' => $request->salary_structure_id, // Update salary_structure_id
        ]);

        notify()->success('New Designation created successfully');
        return redirect()->back();
    }


    public function  designationList()
    {
        $designations = Designation::with(['department', 'salary'])
            ->latest('id')
            ->get();
        return view('admin.pages.Organization.Designation.designationList',  compact('designations'));
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
        $designation = Designation::find($id);
        $departments  =  Department::all();
        $salaries  =  SalaryStructure::all();
        return view('admin.pages.Organization.Designation.editDesignation', compact('designation',  'departments', 'salaries'));
    }
    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);

        if ($designation) {
            $validate = Validator::make($request->all(), [
                'designation_name' => 'required',
                'designation_id' => 'required',
                'salary_structure_id' => 'required|exists:salary_structures,id',
                'department_id' => 'required|exists:departments,id', // Validate department_id
            ]);

            if ($validate->fails()) {
                notify()->error($validate->getMessageBag());
                return redirect()->back();
            }

            $designation->update([
                'designation_name' => $request->designation_name,
                'designation_id' => $request->designation_id,
                'department_id' => $request->department_id, // Update department_id
                'salary_structure_id' => $request->salary_structure_id, // Update salary_structure_id
            ]);

            notify()->success('Updated successfully.');
            return redirect()->route('organization.designation');
        }
    }

    public function searchDesignation(Request $request)
    {
        $searchTerm = $request->search;

        $designations = Designation::where(function ($query) use ($searchTerm) {
            $query->where('designation_id', 'LIKE', '%' . $searchTerm . '%')
                ->orWhere('designation_name', 'LIKE', '%' . $searchTerm . '%')
                ->orWhereHas('department', function ($departmentQuery) use ($searchTerm) {
                    $departmentQuery->where('department_name', 'LIKE', '%' . $searchTerm . '%');
                });
        })->paginate(10);

        return view('admin.pages.Organization.Designation.searchDesignation', compact('designations'));
    }
}
