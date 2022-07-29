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
    public function contact()
    {
        $setting = Setting::first();
        return view('home.settings.contact', [
            'setting' => $setting
        ]);
    }

    public function storeMessage(Request $request)
    {
        $validated = $request->validate([
            'name' => ['string', 'required'],
            'email' => ['email', 'required'],
            'subject' => 'string',
            'phone' => ['required', 'regex:/(05)[0-9]{9}/'],
            'message' => 'string',
        ]);
        $validated['ip'] = request()->ip();

        Message::create($validated);

        return redirect()->route('contact')->with('info', "your message has been sent.");
    }
}
