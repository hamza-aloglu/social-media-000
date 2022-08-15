<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function store(Request $request)
    {
        $role = new Role();
        $role->setAttribute('name', $request->input('name'));

        $role->save();

        return redirect(route('admin.user.index'));
    }
}
