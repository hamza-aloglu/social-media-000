<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $postlist1 = Post::limit(6)->get();
        return view('home.index', [
            'postlist1' => $postlist1
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
