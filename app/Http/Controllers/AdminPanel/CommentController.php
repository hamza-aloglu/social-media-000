<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Response;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $comments = Comment::all();

        return response(view('admin.comment.index', [
            'data'=>$comments,
        ]));
    }

    /**
     * Display the specific resource.
     *
     * @param Comment $comment
     * @return Response
     */
    public function show(Comment $comment): Response
    {
        $comment->save();
        return \response(view('admin.comment.show', [
            'data' => $comment,
        ]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     * @return Response
     */
    public function destroy(Comment $comment): Response
    {
        $comment -> delete();
        return \response(redirect(route('admin.comment.index')));
    }
}
