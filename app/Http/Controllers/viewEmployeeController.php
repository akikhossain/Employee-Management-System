<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewEmployeeController extends Controller
{
    public function viewEmployee(){
        return view('admin.pages.manageEmployee.viewEmployee');
    }
}
