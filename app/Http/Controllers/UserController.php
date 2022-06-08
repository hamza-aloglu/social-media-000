<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::check() && $uid == Auth::id())
        {
            $visitorFlag = 0;
        }

        return view('home.user.index', [
            'postlist1'=>$postlist1,
            'categories'=>$categories,
            'visitorFlag'=>$visitorFlag,
            'user'=>$user,
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
