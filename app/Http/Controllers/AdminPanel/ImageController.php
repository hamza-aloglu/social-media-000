<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{


    public static function uploadImageToCloudinary(Request $request, ?string $oldImageCloudinaryId = null, string $imageFileName = 'image') : array
    {
        ImageController::destroyImageFromCloudinary($oldImageCloudinaryId);

        $response = $request->file($imageFileName)->storeOnCloudinary();
        $cloudinaryImageURL = $response->getPath();
        $cloudinaryImagePublicID = $response->getPublicId();

        return [$cloudinaryImageURL, $cloudinaryImagePublicID];
    }

    public static function destroyImageFromCloudinary(?string $imageCloudinaryId)
    {
        if ($imageCloudinaryId)
            cloudinary()->admin()->deleteAssets([$imageCloudinaryId]);
    }



    // ---OLD STORAGE STYLE IMAGE SAVING---
    /*
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
        if ($oldFilePath) {
            Storage::disk('public')->delete($oldFilePath);
        }

        if ($newImage = $request->file($newFileName)) {
            $newImage = $newImage->store('public/images');
            if ($oldFilePath) {
                Storage::disk('public')->delete($oldFilePath);
            }
            return str_replace('public/', "", $newImage);
        }

        return "";
    }
    public static function destroyFileFromPublicStorage($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
    */
}
