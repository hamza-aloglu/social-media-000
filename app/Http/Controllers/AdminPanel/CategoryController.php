<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Category;
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
    public function index()
    {
        $data = category::all();
        return view('admin.category.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $data = category::all();
        return view('admin.category.create', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'parentid' => ['required', 'int'],
           'title' => ['required', 'max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'image' => ['image'],
            'status' => ['string'],
        ]);


        if($request -> file('image'))
        {
            $validated['image'] = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', "",  $validated['image']);
        }

        Category::create($validated);
        return \response(redirect(route('admin.category.index')));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return Response
     */
    public function show(category $category, $id)
    {
        $data = category::find($id);
        return view('admin.category.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return Response
     */
    public function edit(category $category, $id)
    {
        $data = category::find($id);
        $datalist = category::all();
        return view('admin.category.edit', [
            'data' => $data,
            'datalist' => $datalist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return Response
     */
    public function update(Request $request, category $category, $id)
    {
        $data = category::find($id);
        $validated = $request->validate([
            'parentid' => ['required', 'int'],
            'title' => ['required', 'max:255'],
            'keywords' => ['max:255'],
            'description' => ['max:255'],
            'image' => ['image'],
            'status' => ['string'],
        ]);
        if($request -> file('image'))
        {
            if ($data->image)
                Storage::disk('public')->delete($data->image);

            $validated['image'] = $request->file('image')->store('public/images');
            $validated['image'] = str_replace('public/', "",  $validated['image']);
        }

        Category::create($validated);
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return Response
     */
    public function destroy(category $category, $id)
    {
        $data = category::find($id);
        if($data -> image && Storage::disk('public') -> exists($data->image))
        {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect('/admin/category');
    }
}
