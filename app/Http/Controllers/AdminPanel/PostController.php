<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = Post::all();
        return \response(view('admin.post.index', [
            'data' => $data,
        ]), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $data = Category::all();
        return \response(view('admin.post.create', [
            'data' => $data
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $validated = $request->validate([
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'image' => ['image'],
            'detail' => ['string'],
            'status' => ['string'],
        ]);

        if($request -> file('image'))
        {
            $validated['image'] = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', "", $validated['image']);
        }

        Post::create($validated);

        return \response(redirect(route('admin.post.index')), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\post $post
     * @param $id
     * @return Response
     */
    public function show(Post $post, $id): Response
    {
        $data = Post::find($id);
        return \response(view('admin.post.show', [
            'data' => $data
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\post $post
     * @param $id
     * @return Response
     */
    public function edit(Post $post, $id): Response
    {
        $data = Post::find($id);
        $datalist = category::all();
        return \response(view('admin.post.edit', [
            'data' => $data,
            'datalist' => $datalist
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\post  $post
     * @return Response
     */
    public function update(Request $request, post $post, $id): Response
    {
        $data = Post::find($id);
        $validated = $request->validate([
            'category_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'title' => ['required', 'max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'image' => ['image'],
            'detail' => ['string'],
            'status' => ['string'],
        ]);
        if($request -> file('image'))
        {
            if ($data->image)
                Storage::disk('public')->delete($data->image);

            $validated['image'] = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', "", $validated['image']);
        }

        $data->update($validated);
        return \response(redirect(route('admin.post.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return Response
     */
    public function destroy(post $post, $id)
    {
        $data = Post::find($id);
        if($data -> image && Storage::disk('public') -> exists($data->image))
        {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return \response(redirect(route('admin.post.index')));
    }
}
