<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
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
        $clients = Client::all();
        return view('Frontend.partials.homeDashboard', compact('services', 'notices', 'clients'));
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

    public function contactStore(Request $request)
    {
        // dd($request->all());
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }

        Contact::create([
            'date' => Carbon::now(),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        notify()->success('Message Sent Successfully');
        return redirect()->back();
    }

    // job list section
    public function jobList()
    {
        return view('Frontend.pages.JobList.jobList');
    }


    //notice list
    public function noticeList()
    {
        $notices = Notify::all();
        return view('Frontend.pages.Notice.noticeList', compact('notices'));
    }

    // edit delete notice
    public function noticeDelete($id)
    {
        $notice = Notify::find($id);
        if ($notice) {
            $notice->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }

    // edit
    public function noticeEdit($id)
    {
        $notice = Notify::find($id);
        return view('Frontend.pages.Notice.editNoticeList', compact('notice'));
    }
    public function noticeUpdate(Request $request, $id)
    {
        $notice = Notify::find($id);
        if ($notice) {

            $validate = Validator::make($request->all(), [
                'notice_title' => 'required',
                'description' => 'required',
            ]);

            if ($validate->fails()) {
                notify()->error($validate->getMessageBag());
                return redirect()->back();
            }

            $notice->update([
                'notice_title' => $request->notice_title,
                'description' => $request->description,
                'select_date' => Carbon::now(),
            ]);
            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }


    // about  us
    public function aboutUs()
    {
        return view('Frontend.AboutUs.aboutUs');
    }
}
