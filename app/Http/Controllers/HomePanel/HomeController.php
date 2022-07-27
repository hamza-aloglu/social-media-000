<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\AdminPanel\ImageController;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateRequestPost;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function view;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return Category::where('parentid', 0)->with('children')->get();
    }

    public function index()
    {
        $postlist1 = Post::limit(8)->get();
        $setting = Setting::first();
        $categories = category::all();
        //$users = User::all();
        return view('home.main-page.index', [
            'postlist1' => $postlist1,
            'setting' => $setting,
            'categories' => $categories,
            //'users'=>$users,
        ]);
    }

    public function storeComment(Request $request)
    {
        $validated = $request->validate([
            'user_id' => ['integer'],
            'post_id' => ['integer'],
            'comment' => ['string', 'max:255'],
            'rate' => ['Integer'],
        ]);


        Comment::create($validated);

        return redirect()->route('post', ['id' => $request->input('post_id')])->
        with('info', "your comment has been sent.");
    }

    public function storePost(StoreAndUpdateRequestPost $request)
    {
        $validated = $request->validated();
        $validated['image'] = ImageController::storeFileToPublicStorage($request);

        Post::create($validated);
        return redirect()->route('home');
    }


    public function getPostPage(Post $post)
    {
        $pid = $post->getAttribute('id');

        $comments = Comment::where('post_id', $pid)->get();
        $images = Image::where('post_id', $pid)->get();

        return view('home.main-page.post', [
            'data' => $post,
            'images' => $images,
            'comments' => $comments,
        ]);
    }

    public function postCategory(Category $category)
    {
        $cid = $category->getAttribute('id');
        $posts = Post::all()->where('category_id', '=', $cid);
        return view('home.main-page.categoryposts', [
            'category' => $category,
            'posts' => $posts,
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


}
