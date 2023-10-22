<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewEmployeeController extends Controller
{
    public function viewEmployee(){
        $employees = Employee::all();
        return view('admin.pages.manageEmployee.viewEmployee',compact('employees'));
    }
}
