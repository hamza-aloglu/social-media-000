<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FriendController extends Controller
{
    public function index()
    {
        return view('home.user.friends');
    }

    public function friendRequest($fid)
    {
        $friendship = new Friend();
        $uid = Auth::id();

        $friendship->setAttribute('user_id', $uid);
        $friendship->setAttribute('friend_id', $fid);

        $friendship->save();
        return back()->with('info', 'request sent');
    }

    public function friendAccept($fid)
    {
        DB::table('friends')
            ->where('friend_id', '=', Auth::id())
            ->where('user_id', '=', $fid)
            ->update(['accepted' => 1]);

        return back();
    }

    public function friendDelete($fid)
    {
        DB::table('friends')
            ->where('friend_id', '=', Auth::id())
            ->where('user_id', '=', $fid)
            ->delete();

        return back();
    }
}
