<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function serviceForm()
    {
        return view('admin.pages.ServiceSection.serviceForm');
    }
    public function serviceStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'service_name' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }
        $fileName = null;
        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('/uploads', $fileName);
        }

        Service::create([
            'service_name' => $request->service_name,
            'description' => $request->description,
            'service_image' => $fileName,
        ]);
        notify()->success('New Services created successfully.');
        return redirect()->back();
    }
}
