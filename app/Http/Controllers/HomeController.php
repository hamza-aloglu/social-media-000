<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('home.index');
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
