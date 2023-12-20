<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Notify;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class homeController extends Controller
{
    public function home()
    {
        $services = Service::all();
        $notices = Notify::all();
        return view('Frontend.partials.homeDashboard', compact('services', 'notices'));
    }

    public function showNotice()
    {
        $notices = Notify::all();
        return view('admin.pages.Notices.notices', compact('notices'));
    }

    public function service()
    {
        $services = Service::all();
        return view('Frontend.pages.serviceSection.serviceCard', compact('services'));
    }

    // details service

    public function details($id)
    {
        $services = Service::find($id);
        return view('Frontend.pages.serviceSection.serviceDetails', compact('services'));
    }
    public function notice()
    {
        $notices = Notify::all();
        return view('Frontend.pages.Notice.notice', compact('notices'));
    }
    public function noticeStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'notice_title' => 'required',
            'description' => 'required',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        Notify::create([
            'notice_title' => $request->notice_title,
            'description' => $request->description,
            'select_date' => Carbon::now(),


        ]);
        notify()->success('New Notice created successfully');
        return redirect()->back();
    }

    // contact
    public function contact()
    {

        return view('Frontend.pages.contactUs.contactUs');
    }


    // job list section
    public function jobList()
    {
        return view('Frontend.pages.JobList.jobList');
    }
}
