<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageController extends Controller
{
    /**
     * Serve image files from storage with caching headers
     *
     * @param Request $request
     * @param string $path
     * @return BinaryFileResponse|\Illuminate\Http\Response
     */
    public function show(Request $request, string $path)
    {
        // Ensure the path is safe and within our expected directories
        $allowedPaths = ['awareness-programs'];

        $pathParts = explode('/', $path);
        $baseDir = $pathParts[0] ?? '';

        if (!in_array($baseDir, $allowedPaths)) {
            abort(404);
        }

        // Check if file exists in storage/app/public/
        if (!Storage::disk('public')->exists($path)) {
            abort(404);
        }

        // Get full path to file
        $fullPath = Storage::disk('public')->path($path);

        // Return file with caching headers (1 year)
        return response()->file($fullPath, [
            'Cache-Control' => 'public, max-age=31536000', // 1 year in seconds
            'Content-Type' => mime_content_type($fullPath),
        ]);
    }
}