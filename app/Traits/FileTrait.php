<?php

namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
trait FileTrait
{
    public function uploadFile($folder, $file)
    {
        if (App::environment('local')) {
            return url(Storage::url(Storage::putFile("public/$folder", $file, 'public')));
        } else {
            // return $file->storeOnCloudinary($folder)->getPublicId();
        }
    }

    public function uploadCsv($folder, $file)
    {
        if (App::environment('local')) {
            return Storage::url(Storage::putFile("public/$folder", $file, 'public'));
        } else {
            // return $file->storeOnCloudinary($folder)->getPublicId();
        }
    }

    public function readCSV(string $path) : array {
        $path = public_path($path);
        $file = fopen($path, 'r');

        $header = fgetcsv($file);

        $data = [];
        while ($row = fgetcsv($file)) {
            $data[] = array_combine($header, $row);
        }

        fclose($file);

        return $data;
    }

    public function deleteCSVFile($path) {
        unlink(public_path($path));
    }


    public function loadFile($publicId)
    {
        if (App::environment('local')) {
            return $publicId;
        } else {
            // return Cloudinary::getUrl($publicId);
        }
    }

    public function deleteFile($file)
    {
        if (App::environment('local')) {
            $path = str_replace('http://127.0.0.1:8000/storage/','', $file);
            $path = storage_path("app/public/$path");
            if (file_exists($path)) {
                return unlink($path);
            }
        } else {
            // return Cloudinary::destroy($file);
        }
    }
}
