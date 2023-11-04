<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function department()
    {
        return view('admin.pages.Organization.Department.department');
    }
}
