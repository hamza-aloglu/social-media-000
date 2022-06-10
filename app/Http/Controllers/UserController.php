<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $uid
     * @return \Illuminate\Http\Response
     */
    public function index($uid)
    {
        $categories = category::all(); // for creating post on profile.
        $user = User::find($uid);
        $postlist1 = $user->posts;
        $visitorFlag = 1;
        $isRequested = 0;
        if (Auth::check())
        {
            foreach (Auth::user()->friendsTo as $friend){
                if ($friend->id == $uid)
                    $isRequested = 1;
            }
            foreach (Auth::user()->friendsFrom as $friend){
                if ($friend->id == $uid)
                    $isRequested = 1;
            }
            if($uid == Auth::id())
            {
                $visitorFlag = 0;
            }

        }



        return view('home.user.index', [
            'postlist1'=>$postlist1,
            'categories'=>$categories,
            'visitorFlag'=>$visitorFlag,
            'user'=>$user,
            'isRequested'=>$isRequested,
        ]);
    }



    public function comment($uid)
    {
        $comments = Comment::where('user_id', '=', $uid)->get();
        $user = User::find($uid);
        $visitorFlag = 1;
        if (Auth::check() && $uid == Auth::id())
        {
            $visitorFlag = 0;
        }
        return view('home.user.comments', [
            'comments' => $comments,
            'user' => $user,
            'visitorFlag' => $visitorFlag,
        ]);
    }

    public function commentDestroy($id)
    {
        $data = Comment::find($id);
        $data->delete();
        return redirect(route('userpanel.comment'));
    }

    public function friend()
    {
        return view('home.user.friends');
    }

    public function friendRequest($fid)
    {
        $friendship = new Friend();
        $uid = Auth::id();
        $friendship->user_id = $uid; $friendship->friend_id = $fid;
        $friendship->save();
        /*$friendship2 = new Friend();
        $friendship2->user_id = $fid; $friendship2->friend_id = $uid; // if x is friend with y, y is friend with x.
        $friendship2->save();*/
        return back()->with('info', 'request sent');
    }

    public function friendAccept($fid)
    {
        $friendship = DB::table('friends')->where('friend_id', '=', Auth::id())->
            where('user_id', '=', $fid)->update(['accepted'=>1]);

        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('home.user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
