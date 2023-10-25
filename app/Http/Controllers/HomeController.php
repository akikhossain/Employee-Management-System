<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function login()
    {
        return view('admin.pages.adminLogin');
    }
    public function home()
    {
        return view('admin.pages.dashboard');
    }
}
