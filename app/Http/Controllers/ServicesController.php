<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function serviceForm()
    {
        return view('admin.pages.ServiceSection.serviceForm');
    }
}
