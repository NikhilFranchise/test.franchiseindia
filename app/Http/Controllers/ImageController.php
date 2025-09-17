<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function resize($size, $path)
    {
        $path = str_replace(['../', './'], '', $path);

        if (!preg_match('/^(\d+)x(\d+)$/', $size, $matches)) {
            abort(404, 'Invalid size format');
        }

        $width = (int) $matches[1];
        $height = (int) $matches[2];

        $cacheDir = "public/cache/{$size}";
        $filename = md5($path) . ".webp";

        if (Storage::exists("{$cacheDir}/{$filename}")) {
            return Storage::download("{$cacheDir}/{$filename}");
        }

        $s3Url = 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/' . $path;

        // Call Node.js service
        $nodeResponse = Http::get('http://localhost:3000/process', [
            'width' => $width,
            'height' => $height,
            'imageUrl' => $s3Url
        ]);

        if ($nodeResponse->failed()) {
            abort(500, 'Image processing failed');
        }

        // Save processed image to Laravel storage
        Storage::put("{$cacheDir}/{$filename}", $nodeResponse->body());

        return Storage::download("{$cacheDir}/{$filename}");
    }
}
