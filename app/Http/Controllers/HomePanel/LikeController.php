<?php

namespace App\Http\Controllers\HomePanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\UnlikeRequest;

class LikeController extends Controller
{
    public function like(LikeRequest $request)
    {
        $request->user()->like($request->likeableInstance());

        // if you don't want to use old form requests
        if ($request->ajax()) {
            return response()->json([
                'likes' => $request->likeableInstance()->likes()->count(),
            ]);
        }

        return redirect()->back();
    }

    public function unlike(UnlikeRequest $request)
    {
        $request->user()->unlike($request->likeableInstance());

        // if you don't want to use old form requests
        if ($request->ajax()) {
            return response()->json([
                'likes' => $request->likeableInstance()->likes()->count(),
            ]);
        }

        return redirect()->back();
    }
}
