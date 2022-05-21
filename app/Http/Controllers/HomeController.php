<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Comment;
use App\Models\faq;
use App\Models\Message;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public static function maincategorylist()
    {
        return category::where('parentid', '=', 0) -> with('children') -> get();
    }


    public function index()
    {
        $postlist1 = Post::limit(6)->get();
        $setting = Setting::first();
        return view('home.index', [
            'postlist1'=>$postlist1,
            'setting'=>$setting
        ]);
    }

    public function about()
    {
        $setting = Setting::first();
        return view('home.about', [
            'setting'=>$setting
        ]);
    }

    public function references()
    {
        $setting = Setting::first();
        return view('home.references', [
            'setting'=>$setting
        ]);
    }

    public function contact()
    {
        $setting = Setting::first();
        return view('home.contact', [
            'setting'=>$setting
        ]);
    }

    public function faq()
    {
        $setting = Setting::first();
        $datalist = faq::all();
        return view('home.faq', [
            'datalist'=>$datalist,
            'setting'=>$setting
        ]);
    }

    public function storeMessage(Request $request)
    {
        $data = new Message();
        $data -> name = $request -> input('name');
        $data -> email = $request -> input('email');
        $data -> subject = $request -> input('subject');
        $data -> phone = $request -> input('phone');
        $data -> message = $request -> input('message');
        $data -> ip = request()->ip();
        $data -> save();

        return redirect()->route('contact')->with('info', "your message has been sent.");
    }

    public function storeComment(Request $request)
    {
        // dd($request); //checking values.

        $data = new Comment();
        $data -> user_id = Auth::id();
        $data -> post_id = $request -> input('post_id');
        $data -> comment = $request -> input('comment');
        $data -> ip = request()->ip();
        $data -> save();

        return redirect()->route('post', ['id'=>$request -> input('post_id')])->
        with('info', "your comment has been sent.");
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
        return view('home.post', [
            'data' => $data,
            'images' => $images,
            'comments' => $comments
        ]);
    }

    public function postcategory($cid, $slug)
    {
        $category = category::find($cid);
        $posts = DB::table('posts')->where('category_id', $cid)->get();
        return view('home.categoryposts', [
            'category'=>$category,
            'posts'=>$posts
        ]);
    }

    public function test()
    {
        return view('home.test');
    }

    public function param($id, $name) // parameter name should be same as on route url. It is not must.
    {
        echo "parameter is ", $id, "<br>";
        echo "name is ", $name;
    }

    public function showView($id, $name)
    {
        return view('home.test', [
            'id' => $id,
            'name' => $name
        ]);
    }

    public function save()
    {
        return view('home.receiver', [
            'name' => $_REQUEST["fname"],
            'lname' => $_REQUEST["lname"]
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
