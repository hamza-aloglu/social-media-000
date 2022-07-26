<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function redirect;
use function request;
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

    public function storePost(Request $request)
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'image' => ['image'],
            'detail' => ['string'],
            'status' => ['string'],
        ]);

        if($request -> file('image'))
        {
            $validated['image'] = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', "", $validated['image']);
        }

        Post::create($validated);
        return redirect()->route('home');
    }


    public function post($id)
    {
        $data = Post::find($id);

        $comments = Comment::where('post_id', $id)->get();
        $images = Image::where('post_id', $id)->get();

        return view('home.main-page.post', [
            'data' => $data,
            'images' => $images,
            'comments' => $comments,
        ]);
    }

    public function postcategory($cid, $slug)
    {
        $category = category::find($cid);
        $posts = Post::all()->where('category_id', '=', $cid);
        //$posts = DB::table('posts')->where('category_id', $cid)->get(); if you use this line of code, you will not be able to reach user of the post because this method does not use eloquent model
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
