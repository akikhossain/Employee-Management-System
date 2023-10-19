<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class manageEmployeeController extends Controller
{
    public function addEmployee(){
        return view('admin.pages.manageEmployee.addEmployee');
    }
}
