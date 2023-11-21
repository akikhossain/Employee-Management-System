<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.pages.AdminLogin.adminLogin');
    }

    public function loginPost(Request $request)
    {
        $val = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required|min:6|max:8',
            ]
        );

        if ($val->fails()) {
            //message
            return redirect()->back()->withErrors($val);
        }

        $credentials = $request->except('_token');

        $login = auth()->attempt($credentials);
        if ($login) {
            notify()->success('Successfully Logged in');
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors('invalid user email or password');
    }

    public function logout()
    {

        auth()->logout();
        notify()->success('Successfully Logged Out');
        return redirect()->route('admin.login');
    }


    public function list()
    {

        $users = User::all();
        // dd($users);
        return view('admin.pages.Users.list', compact('users'));
    }

    public function createForm()
    {
        return view('admin.pages.Users.createForm');
    }


    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            notify()->error('Invalid Credentials.');
            return redirect()->back();
        }

        $fileName = null;
        if ($request->hasFile('user_image')) {
            $file = $request->file('user_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('/uploads', $fileName);
        }


        User::create([
            'name' => $request->name,
            'role' => $request->role,
            'image' => $fileName,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        notify()->success('User created successfully.');
        return redirect()->back();
    }

    public function userProfile()
    {
        return view('admin.pages.Users.userProfile');
    }
}
