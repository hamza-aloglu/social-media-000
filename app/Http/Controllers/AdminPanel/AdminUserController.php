<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('admin.user.index', [
            'data' => $data
        ]);
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
        $data = User::find($id);
        $roles = Role::all();
        return view('admin.user.show', [
            'data' => $data,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = User::find($id);
        $data -> delete();
        return redirect(route('admin.user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * */
    public function addRoleImage($id, Request $request)
    {
        $data = new RoleUser();
        $data -> user_id = $id;
        $data -> role_id = $request->input('role_id');
        $user = User::find($id);
        if($request -> file('profile_picture'))
        {
            $user->profile_picture = $request->file('profile_picture')->store('images');
        }
        if($request -> file('background_picture'))
        {
            $user->background_picture = $request->file('background_picture')->store('images');
        }
        $data -> save();
        $user -> save();
        return redirect()->route('admin.user.show', [
            'id'=>$id
        ]);
    }

    public function destroyRole($uid, $rid)
    {
        $user = User::find($uid);
        $user->roles()->detach($rid);
        return redirect()->route('admin.user.show', [
            'id'=>$uid
        ]);
    }

}
