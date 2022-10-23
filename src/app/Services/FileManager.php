<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FileManager
{
    public const FILENAME_CHARS = 12;
    const STORAGE_IMG_DIR = 'app/public';

    public function delete(string $imageName): bool
    {
        return File::delete(storage_path(self::STORAGE_IMG_DIR . '/' . $imageName));
    }

    public function upload(UploadedFile $imageFile): string
    {
        $imageName = $this->generateRandomImageName($imageFile);
        $this->saveImage($imageFile, $imageName);
        return $imageName;
    }

    public static function getImageUrl(string $imageName): string
    {
        return url('storage/' . $imageName);
    }

    protected function generateRandomImageName(UploadedFile $imageFile): string
    {
        do {
            $imageName = Str::random(self::FILENAME_CHARS) . '.' . $imageFile->clientExtension();
        } while ($this->fileNameIsTaken($imageName));
        return $imageName;
    }

    protected function saveImage(UploadedFile $imageFile, string $imageName)
    {
        $imageFile->move(storage_path(self::STORAGE_IMG_DIR), $imageName);
    }

    protected function fileNameIsTaken(string $filename): bool
    {
        return file_exists(storage_path(self::STORAGE_IMG_DIR) . '/' . $filename);
    }
}
