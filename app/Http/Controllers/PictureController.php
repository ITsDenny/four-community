<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PictureController extends Controller
{
    public function storePicture(?UploadedFile $image, ?string $folderName)
    {
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        $folderPath = storage_path("app/public/$folderName");
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        }

        $path = $image->storeAs($folderName, $fileName, 'public');

        $pictureUrl = Member::create([
            'picture' => $path
        ]);

        return $pictureUrl;
    }
}
