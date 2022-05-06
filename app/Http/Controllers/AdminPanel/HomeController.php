<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        $data = Setting::first();
        if($data===null)
        {
            $data = new Setting();
            $data->title = "default title";
            $data->save();
            $data = Setting::first();
        }

        return view('admin.setting', [
            'data'=>$data
        ]);
    }

    public function updateSetting()
    {
        echo "updated settings...";
    }
}
