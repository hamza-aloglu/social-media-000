<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use function back;
use function redirect;
use function view;

class UserController extends Controller
{
    public function index(User $user)
    {
        $setting = Setting::first();
        $categories = category::all(); // categories are taken for creating post on profile.
        $postlist1 = $user->posts;
        $visitorFlag = 1;
        $isRequested = 0;

        $uid = $user->getAttribute('id');
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

    public function getCommentsOfTheUser(User $user)
    {
        $uid = $user->getAttribute('id');
        $comments = Comment::where('user_id', $uid)->get();
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

    public function commentDestroy(Comment $comment)
    {
        $comment->delete();
        return redirect(route('userpanel.comment'));
    }

    public function postDestroy(Post $post)
    {
        $postImage = $post->getAttribute('image');
        if($postImage && Storage::disk('public') -> exists($postImage))
        {
            Storage::disk('public')->delete($postImage);
        }

        $post->delete();
        return back();
    }

    public function searchUsers(Request $request)
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

    public function updatePictures(Request $request)
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
        return redirect()->route('userpanel.index', ['user'=>Auth::id()]);
    }

    public function edit()
    {
        return view('home.user.edit');
    }
}
