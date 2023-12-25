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
            'details' => 'required',
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
            'details' => $request->details,
        ]);
        notify()->success('New Services created successfully.');
        return redirect()->back();
    }

    public function serviceList()
    {
        $services = Service::all();
        return view('admin.pages.ServiceSection.listServicec', compact('services'));
    }


    // edit delete update
    public function serviceDelete($id)
    {
        $service =  Service::find($id);
        if ($service) {
            $service->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }

    // edit
    public function serviceEdit($id)
    {
        $service = Service::find($id);
        return view('admin.pages.ServiceSection.editServiceList', compact('service'));
    }
    public function serviceUpdate(Request $request, $id)
    {
        $service = Service::find($id);
        if ($service) {

            $validate = Validator::make($request->all(), [
                'service_name' => 'required',
                'description' => 'required',
                'details' => 'required',
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

            $service->update([
                'service_name' => $request->service_name,
                'description' => $request->description,
                'service_image' => $fileName,
                'details' => $request->details,
            ]);
            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }
}
