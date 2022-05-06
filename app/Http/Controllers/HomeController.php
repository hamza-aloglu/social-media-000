<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
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

    public function post($id)
    {
        $data = Post::find($id);
        // $images = DB::table('images')->where('post_id', $id)->get();
        $images = DB::select('SELECT * FROM images WHERE post_id = ?', [$id]); // could be problematic.
        return view('home.post', [
            'data' => $data,
            'images' => $images
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
}
