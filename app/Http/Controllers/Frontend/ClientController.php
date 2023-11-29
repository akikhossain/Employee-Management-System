<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function clientList()
    {
        return view('Frontend.pages.ClientList.clientList');
    }
}
