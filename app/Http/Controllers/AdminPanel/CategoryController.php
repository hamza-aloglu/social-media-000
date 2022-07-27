<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorAndUpdateRequestCategory;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    protected array $appends = [
        'getParentsTree'
    ];

    public static function getParentsTree($category, $title)
    {
        if ($category -> parentid == 0)
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
        $categories = category::all();
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
        $categories = category::all();
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

        $validated['image'] = ImageController::storeFileToPublicStorage($request);

        Category::create($validated);
        return \response(redirect(route('admin.category.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @return Response
     */
    public function show(category $category): Response
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
        $datalist = category::all();
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
    public function update(StorAndUpdateRequestCategory $request, category $category): Response
    {
        $validated = $request->validated();
        $validated['image'] = ImageController::updateFileFromPublicStorage($request, $category->getAttribute('image'));

        $category->update($validated);

        return \response(redirect(route('admin.category.index')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(category $category): Response
    {
        $categoryImage = $category->getAttribute('image');
        if($categoryImage && Storage::disk('public') -> exists($categoryImage))
        {
            Storage::disk('public')->delete($categoryImage);
        }
        $category->delete();
        return \response(redirect('/admin/category'));
    }
}
