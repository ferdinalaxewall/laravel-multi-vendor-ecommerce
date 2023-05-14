<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Image
{
    public function saveImage($image, $directory, $oldImageFileName = null)
    {
        $file = $image;
        $file_name = $file->getClientOriginalName();
        $file_ext = $file->getClientOriginalExtension();
        $file_path = md5(time() . $file_name) . "." . $file_ext;

        if(Storage::exists($directory.'/'.$oldImageFileName)){
            Storage::disk('public')->delete($directory.'/'.$oldImageFileName);
        }

        $file->storeAs($directory, $file_path);

        return $file_path;
    }
}