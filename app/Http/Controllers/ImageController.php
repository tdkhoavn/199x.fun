<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function showAvatar($id, $file_name)
    {
        $path   = 'data' . DIRECTORY_SEPARATOR . 'avatars' . DIRECTORY_SEPARATOR . "{$id}/{$file_name}";
        $exists = Storage::disk('upload')->exists($path);
        if (!$exists) {
            return response()
                ->file(public_path('backend/img/no-avatar.png'));
        }

        return response()
            ->file(storage_path('upload' . DIRECTORY_SEPARATOR . $path));
    }
}
