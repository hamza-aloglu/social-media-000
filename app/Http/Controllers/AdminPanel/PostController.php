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
        $posts = Post::all();
        return \response(view('admin.post.index', [
            'data' => $posts,
        ]), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $categories = Category::all();
        return \response(view('admin.post.create', [
            'data' => $categories,
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

        if ($request->file('image')) {
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
     * @return Response
     */
    public function show(Post $post): Response
    {
        return \response(view('admin.post.show', [
            'data' => $post
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\post $post
     * @return Response
     */
    public function edit(Post $post): Response
    {
        $datalist = category::all();
        return \response(view('admin.post.edit', [
            'data' => $post,
            'datalist' => $datalist
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\post $post
     * @return Response
     */
    public function update(Request $request, post $post): Response
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
        $oldImage = $post->getAttribute('image');
        if ($newImage = $request->file('image')) {
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }

            $newImage = $newImage->store('public/images');
            $validated['image'] = str_replace('public/', "", $newImage);
        }

        $post->update($validated);
        return \response(redirect(route('admin.post.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\post $post
     * @return Response
     */
    public function destroy(post $post): Response
    {
        $image = $post->getAttribute('image');

        if ($image && Storage::disk('public')->exists($image)) {
            Storage::disk('public')->delete($image);
        }
        $post->delete();
        return \response(redirect(route('admin.post.index')));
    }
}
