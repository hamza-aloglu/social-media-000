<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Friend;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $friends = Friend::all();
        return \response(view('admin.friends.index', [
            'data'=>$friends,
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Friend $friend
     * @return Response
     */
    public function destroy(Friend $friend): Response
    {
        $friend -> delete();
        return \response(redirect(route('admin.friend.index')));
    }
}
