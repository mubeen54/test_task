<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class FileHelper
{
    public function storeFiles($logoImage)
    {
        $logoFilePath = $this->storeFile($logoImage, 'public/logos');
        return $this->getFileUrl($logoFilePath);
    }

    private function storeFile($file, $storagePath)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        return $file->storeAs($storagePath, $fileNameToStore);
    }

    private function getFileUrl($filePath)
    {
        return asset(Storage::url($filePath));
    }

    public static function deletePublicFile($filePath)
    {
        $path = str_replace(asset('/'), '', $filePath);
        Storage::disk('public')->delete($path);
    }
}
