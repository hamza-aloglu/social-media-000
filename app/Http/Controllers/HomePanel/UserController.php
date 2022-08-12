<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function back;
use function redirect;
use function view;

class UserController extends Controller
{
    public function index(User $user)
    {
        $categories = Category::all(); // categories are taken for creating post on profile.
        $postlist1 = $user->posts;

        $visitorFlag = 1;
        $isFriendRequestSent = 0;
        $uid = $user->getAttribute('id');
        if (Auth::check()) {
            $onlineUser = Auth::user();


            foreach ($onlineUser->friendsTo as $friend) {
                if ($friend->id == $uid)
                    $isFriendRequestSent = 1;
            }
            foreach ($onlineUser->friendsFrom as $friend) {
                if ($friend->id == $uid)
                    $isFriendRequestSent = 1;
            }
            if ($uid == Auth::id()) {
                $visitorFlag = 0;
            }
        }

        return view('home.user.index', [
            'postlist1' => $postlist1,
            'categories' => $categories,
            'visitorFlag' => $visitorFlag,
            'user' => $user,
            'isFriendRequestSent' => $isFriendRequestSent,
        ]);
    }

    public function getCommentsOfTheUser(User $user)
    {
        $uid = $user->getAttribute('id');
        $comments = Comment::where('user_id', $uid)->get();
        $visitorFlag = 1;
        if (Auth::check() && $uid == Auth::id()) {
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
        ImageController::destroyImageFromCloudinary($post->getAttribute('image_public_id'));

        $post->delete();
        return back();
    }

    public function searchUsers(Request $request)
    {
        $result = $request->query('query');

        if ($result) {
            $users = User::where('name', 'LIKE', "%{$result}%")->get();
        } else
            $users = null;

        return view('home.user.searchuser', [
            'users' => $users,
        ]);
    }

    public function updatePictures(Request $request)
    {
        $user = User::find(Auth::id());

        $request->validate([
            'profile_photo_path' => 'image',
        ]);

        [$user->profile_photo_path, $user->profile_photo_public_id] = ImageController::uploadImageToCloudinary(
            $request,
            $user->profile_photo_public_id,
            'profile_photo_path');


        $request->validate([
            'background_photo_path' => 'image',
        ]);
        [$user->background_photo_path, $user->background_photo_public_id] = ImageController::uploadImageToCloudinary(
            $request,
            $user->background_photo_public_id,
            'background_photo_path');

        $user->save();
        return redirect()->route('userpanel.index', ['user' => Auth::id()]);
    }

    public function edit()
    {
        return view('home.user.edit');
    }
}
