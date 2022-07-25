<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comment;
use App\Models\Friend;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use DataTables\Editor\Validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function back;
use function redirect;
use function view;

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
        $setting = Setting::first();
        $categories = category::all(); // for creating post on profile.
        $user = User::find($uid);
        $postlist1 = $user->posts;
        $visitorFlag = 1;
        $isRequested = 0;
        if (Auth::check())
        {
            $onlineUser = Auth::user();
            foreach ($onlineUser->friendsTo as $friend){
                if ($friend->id == $uid)
                    $isRequested = 1;
            }
            foreach ($onlineUser->friendsFrom as $friend){
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
            'setting'=>$setting,
        ]);
    }



    public function comment($uid)
    {
        $comments = Comment::where('user_id', $uid)->get();
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

    public function postDestroy($pid)
    {
        $data = Post::find($pid);

        if($data -> image && Storage::disk('public') -> exists($data->image))
        {
            Storage::disk('public')->delete($data->image);
        }

        $data->delete();
        return back();
    }

    public function friend()
    {
        return view('home.user.friends');
    }

    public function friendRequest($fid)
    {
        $friendship = new Friend();
        $uid = Auth::id();

        $friendship->user_id = $uid;
        $friendship->friend_id = $fid;

        $friendship->save();
        return back()->with('info', 'request sent');
    }

    public function friendAccept($fid)
    {
        DB::table('friends')->where('friend_id', '=', Auth::id())->
            where('user_id', '=', $fid)->update(['accepted'=>1]);

        return back();
    }

    public function friendDelete($fid)
    {
        DB::table('friends')->where('friend_id', '=', Auth::id())->
        where('user_id', '=', $fid)->delete();

        return back();
    }

    public function searchUser(Request $request)
    {
        $result = $request->query('query');

        if ($result)
        {
            $users = User::where('name', 'LIKE', "%{$result}%")->get();
        }
        else
            $users = null;

        return view('home.user.searchuser', [
            'users'=>$users,
        ]);
    }

    public function editPictures(Request $request)
    {
        $user = User::find(Auth::id());

        if($request -> file('profile_picture'))
        {
            $request->validate([
                'profile_picture' => 'image',
            ]);

            if ($user->profile_picture)
                Storage::disk('public')->delete($user->profile_picture);

            $user->profile_picture = $request->file('profile_picture')->store('public/images');
            $user->profile_picture = str_replace('public/', "", $user->profile_picture);
        }
        if($request -> file('background_picture'))
        {
            $request->validate([
                'background_picture' => 'image',
            ]);

            if ($user->background_picture)
                Storage::disk('public')->delete($user->background_picture);

            $user->background_picture = $request->file('background_picture')->store('public/images');
            $user->background_picture = str_replace('public/', "", $user->background_picture);
        }
        $user->save();
        return redirect()->route('userpanel.index', ['uid'=>Auth::id()]);
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
