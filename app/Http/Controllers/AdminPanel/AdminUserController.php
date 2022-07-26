<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminUserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.user.index', [
            'data' => $users
        ]);
    }

    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.user.show', [
            'data' => $user,
            'roles' => $roles,
        ]);
    }

    public function destroy(User $user)
    {
        $user -> delete();
        return redirect(route('admin.user.index'));
    }

    public function addRoleImage($uid, Request $request)
    {
        RoleUser::create([
            'user_id' => $uid,
            'role_id' => $request->input('role_id'),
        ]);

        return redirect()->route('admin.user.show', [
            'user'=>$uid
        ]);
    }

    public function destroyRole(User $user, $rid)
    {
        $user->roles()->detach($rid);
        return redirect()->route('admin.user.show', [
            'user'=>$user->getAttribute('id'),
        ]);
    }

    public function loginadmincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return redirect()->route('loginadmin')->with('error', "Check your inputs");
    }

}
