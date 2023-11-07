<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{

    public function leave()
    {
        return view('admin.pages.Leave.leaveForm');
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
}
