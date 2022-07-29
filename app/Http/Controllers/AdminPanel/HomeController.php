<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        return \response(view('admin.main-page.index'));
    }

    public function setting()
    {
        $setting = Setting::first();
        if($setting===null)
        {
            $setting = new Setting();
            $setting->save();
            $setting = Setting::first();
        }

        return view('admin.settings.setting', [
            'data'=>$setting
        ]);
    }

    public function updateSetting(Request $request)
    {
        $setting = Setting::first();

        $setting->setAttribute('contact', $request->input('contact'));
        $setting->save();

        return redirect()->route('admin.setting', [
            'data' => $setting,
        ]);

    }
}
