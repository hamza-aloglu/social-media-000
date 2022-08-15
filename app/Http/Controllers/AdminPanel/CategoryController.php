<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorAndUpdateRequestCategory;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    protected array $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category, $title)
    {
        if ($category -> parentid == null)
            return $title;
        $parent = Category::find($category->parentid);
        $title = $parent->title .'>'.$title;
        return CategoryController::getParentsTree($parent, $title);
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $categories = Category::all();
        return \response(view('admin.category.index', [
            'data' => $categories,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $categories = Category::all();
        return \response(view('admin.category.create', [
            'data' => $categories,
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(StorAndUpdateRequestCategory $request): Response
    {
        $validated = $request->validated();

        [$validated['image'], $validated['image_public_id']] = ImageController::uploadImageToCloudinary($request);

        Category::create($validated);
        return \response(redirect(route('admin.category.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function show(Category $category): Response
    {
        return \response(view('admin.category.show', [
            'data' => $category,
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(category $category): Response
    {
        $datalist = Category::all();
        return \response(view('admin.category.edit', [
            'data' => $category,
            'datalist' => $datalist
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorAndUpdateRequestCategory $request
     * @param Category $category
     * @return Response
     */
    public function update(StorAndUpdateRequestCategory $request, Category $category): Response
    {
        $validated = $request->validated();
        [$validated['image'], $validated['image_public_id']] = ImageController::uploadImageToCloudinary($request, $category->getAttribute('image_public_id'));

        $category->update($validated);

        return \response(redirect(route('admin.category.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category): Response
    {
        ImageController::destroyImageFromCloudinary($category->getAttribute('image_public_id'));

        $category->delete();
        return \response(redirect('/admin/category'));
    }
}
