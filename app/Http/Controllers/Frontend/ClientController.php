<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function clientList()
    {
        $clients = Client::all();
        return view('Frontend.pages.ClientList.clientList', compact('clients'));
    }

    public function clientForm()
    {
        return view('Frontend.pages.ClientList.clientForm');
    }

    public function clientStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'client_name' => 'required',
            'details' => 'required',
        ]);

        if ($validate->fails()) {
            notify()->error($validate->getMessageBag());
            return redirect()->back();
        }
        $fileName = null;
        if ($request->hasFile('client_image')) {
            $file = $request->file('client_image');
            $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

            $file->storeAs('/uploads', $fileName);
        }

        Client::create([
            'client_name' => $request->client_name,
            'client_image' => $fileName,
            'details' => $request->details,
        ]);
        notify()->success('New Services created successfully.');
        return redirect()->back();
    }

    public function viewClientList()
    {
        $clients = Client::all();
        return view('Frontend.pages.ClientList.viewClientList', compact('clients'));
    }

    public function clientDelete($id)
    {
        $client =  Client::find($id);
        if ($client) {
            $client->delete();
        }
        notify()->success('Deleted Successfully.');
        return redirect()->back();
    }

    // edit
    public function clientEdit($id)
    {
        $client = Client::find($id);
        return view('Frontend.pages.ClientList.editClientList', compact('client'));
    }
    public function clientUpdate(Request $request, $id)
    {
        $client = Client::find($id);
        if ($client) {

            $validate = Validator::make($request->all(), [
                'client_name' => 'required',
                'details' => 'required',
            ]);

            if ($validate->fails()) {
                notify()->error($validate->getMessageBag());
                return redirect()->back();
            }
            $fileName = null;
            if ($request->hasFile('client_image')) {
                $file = $request->file('client_image');
                $fileName = date('Ymdhis') . '.' . $file->getClientOriginalExtension();

                $file->storeAs('/uploads', $fileName);
            }

            $client->update([
                'client_name' => $request->client_name,
                'client_image' => $fileName,
                'details' => $request->details,
            ]);
            notify()->success('Updated successfully.');
            return redirect()->back();
        }
    }
}
