<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function designation()
    {
        return view('admin.pages.Organization.Designation.designation');
    }
}
