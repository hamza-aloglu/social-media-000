<?php

// çoğu uçacak.

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\faq;
use App\Models\Message;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function about()
    {
        $setting = Setting::first();
        return view('home.settings.about', [
            'setting' => $setting
        ]);
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.settings.references', [
            'setting' => $setting
        ]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.settings.contact', [
            'setting' => $setting
        ]);
    }

    public function faq()
    {
        $setting = Setting::first();
        $datalist = faq::all();
        return view('home.settings.faq', [
            'datalist' => $datalist,
            'setting' => $setting
        ]);
    }

    public function storeMessage(Request $request)
    {
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->subject = $request->input('subject');
        $data->phone = $request->input('phone');
        $data->message = $request->input('message');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('contact')->with('info', "your message has been sent.");
    }
}
