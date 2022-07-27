<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Scalar\String_;

class ImageController extends Controller
{
    public static function storeFileToPublicStorage(Request $request, string $fileName = 'image'): string
    {
        if ($request->hasFile('image')) {
            $imagePath = $request->file($fileName)->store('public/images');
            return str_replace('public/', "", $imagePath);
        }
        return "";
    }

    public static function updateFileFromPublicStorage(Request $request, $oldFilePath, string $newFileName = 'image'): string
    {
        if ($newImage = $request->file($newFileName)) {
            $newImage = $newImage->store('public/images');
            return str_replace('public/', "", $newImage);
        }
        if ($oldFilePath) {
            Storage::disk('public')->delete($oldFilePath);
        }
        return "";
    }

    public static function destroyFileFromPublicStorage($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }





    // aşşağısını uçur.


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pid)
    {
        $post = Post::find($pid);
        $images = DB::table('images')->where('post_id', $pid)->get();
        return view('admin.image.index', [
            'images' => $images,
            'post' => $post
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create($pid, Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $pid)
    {
        $data = new Image();
        $data->post_id = $pid;
        $data->title = $request->title;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('public/images');
            $data->image = str_replace('public/', "", $data->image);
        }
        $data->save();
        return redirect()->route('admin.image.index', ['pid' => $pid]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pid, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pid, $id)
    {
        $data = Image::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
        return redirect()->route('admin.image.index', ['pid' => $pid]);
    }
}
