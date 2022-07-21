<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\Comment;
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
        return category::where('parentid', '=', 0)->with('children')->get();
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
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->post_id = $request->input('post_id');
        $data->comment = $request->input('comment');
        $data->rate = $request->input('rate');
        $data->ip = request()->ip();
        $data->save();

        return redirect()->route('post', ['id' => $request->input('post_id')])->
        with('info', "your comment has been sent.");
    }

    public function storePost(Request $request)
    {
        $data = new post();
        $data->category_id = $request->category_id;
        $data->user_id = $request->user_id;
        $data->title = $request->title;
        $data->description = $request->description;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('public/images');
        }
        $data->detail = $request->detail;
        $data->likes = 0;

        $data->save();
        return redirect()->route('home');
    }


    public function post($id)
    {
        $data = Post::find($id);

        $comments = Comment::where('post_id', $id)->where('status', 'true')->get(); // This one uses model of laravel, so we are able to
        // use relationships of that model

        //$comments = DB::table('comments')->where('post_id', $id)->get(); // This one does not use model. It
        // fetches from mysql directly.

        // $images = DB::table('images')->where('post_id', $id)->get();
        $images = DB::select('SELECT * FROM images WHERE post_id = ?', [$id]); // could be problematic.
        return view('home.main-page.post', [
            'data' => $data,
            'images' => $images,
            'comments' => $comments
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
