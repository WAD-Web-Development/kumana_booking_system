<?php

namespace domain\Services;

use Illuminate\Support\Facades\Storage;

class FileService
{
    public function store($file, $folderName)
    {
        $folderPath = 'public/' . $folderName;

        $fileName = time() . '_' . uniqid() . '.' . $file->extension();

        $filePath = Storage::disk('local')->putFileAs($folderPath, $file, $fileName);

        $filePathWithoutPublic = substr($filePath, strlen('public/'));

        return $filePathWithoutPublic;
    }

    public function delete($path)
    {
        $filePath = 'public/' . $path;
        Storage::disk('local')->delete($filePath);
    }

    public function storeFile($file, $folderName, $extension)
    {
        $folderPath = 'public/' . $folderName;

        $fileName = time() . '_' . uniqid() . '.' . $extension;

        $filePath = Storage::disk('local')->putFileAs($folderPath, $file, $fileName);

        $filePathWithoutPublic = substr($filePath, strlen('public/'));

        return $filePathWithoutPublic;
    }
}
