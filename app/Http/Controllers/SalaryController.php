<?php

namespace App\Http\Controllers;

use App\Models\SalaryStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SalaryController extends Controller
{
    public function createSalary()
    {
        return view('admin.pages.Salary.createSalary');
    }

    public function salaryStore(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'salary_class' => 'required|string',
            'basic_salary' => 'required|numeric|min:0',
            'medical_expenses' => 'required|numeric|min:0',
            'mobile_allowance' => 'required|numeric|min:0',
            'houseRent_allowance' => 'required|numeric|min:0',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        SalaryStructure::create([
            'salary_class' => $request->salary_class,
            'basic_salary' => $request->basic_salary,
            'medical_expenses' => $request->medical_expenses,
            'mobile_allowance' => $request->mobile_allowance,
            'houseRent_allowance' => $request->houseRent_allowance,
        ]);
        notify()->success('New Salary created successfully.');
        return redirect()->back();
    }


    public function viewSalary()
    {
        $salaries = SalaryStructure::paginate(3);
        return view('admin.pages.Salary.viewSalary', compact('salaries'));
    }


    // edit, delete, update
    public function salaryDelete($id)
    {
        $salary = SalaryStructure::find($id);
        if ($salary) {
            $salary->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }

    // edit
    public function salaryEdit($id)
    {
        $salary = SalaryStructure::find($id);
        return view('admin.pages.Salary.editSalary', compact('salary'));
    }
    public function salaryUpdate(Request $request, $id)
    {
        $salary = SalaryStructure::find($id);
        if ($salary) {

            $validate = Validator::make($request->all(), [
                'salary_class' => 'required|string',
                'basic_salary' => 'required|numeric|min:0',
                'medical_expenses' => 'required|numeric|min:0',
                'mobile_allowance' => 'required|numeric|min:0',
                'houseRent_allowance' => 'required|numeric|min:0',
            ]);

            if ($validate->fails()) {
                notify()->error($validate->getMessageBag());
                return redirect()->back();
            }

            $salary->update([
                'salary_class' => $request->salary_class,
                'basic_salary' => $request->basic_salary,
                'medical_expenses' => $request->medical_expenses,
                'mobile_allowance' => $request->mobile_allowance,
                'houseRent_allowance' => $request->houseRent_allowance,
            ]);
            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }
}
