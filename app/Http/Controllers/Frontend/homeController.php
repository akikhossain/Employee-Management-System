<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home()
    {
        $services = Service::all();
        return view('Frontend.partials.homeDashboard', compact('services'));
    }
}
