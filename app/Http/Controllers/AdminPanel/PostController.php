<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAndUpdateRequestPost;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Response;

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
     * @param StoreAndUpdateRequestPost $request
     * @return Response
     */
    public function store(StoreAndUpdateRequestPost $request): Response
    {
        $validated = $request->validated();
        [$validated['image'], $validated['image_public_id']] = ImageController::uploadImageToCloudinary($request);

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
        $datalist = Category::all();
        return \response(view('admin.post.edit', [
            'data' => $post,
            'datalist' => $datalist
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreAndUpdateRequestPost $request
     * @param \App\Models\post $post
     * @return Response
     */
    public function update(StoreAndUpdateRequestPost $request, post $post): Response
    {
        $validated = $request->validated();

        [$validated['image'], $validated['image_public_id']] = ImageController::uploadImageToCloudinary($request, $post->getAttribute('image_public_id'));

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
        ImageController::destroyImageFromCloudinary($post->getAttribute('image_public_id'));

        $post->delete();
        return \response(redirect(route('admin.post.index')));
    }
}
