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
            'salary_class' => 'required',
            'basic_salary' => 'required',
            'medical_expenses' => 'required',
            'mobile_allowance' => 'required',
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
        ]);
        notify()->success('New Salary created successfully.');
        return redirect()->back();
    }


    public function viewSalary()
    {
        $salaries = SalaryStructure::paginate(3);
        return view('admin.pages.Salary.viewSalary', compact('salaries'));
    }
}
