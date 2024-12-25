<?php
namespace App\Services\LocalStorage;

use Illuminate\Support\Facades\Storage;

class LocalStorageService{
    public static function storeFile ($file , $object)
    {
        $ext = $file->getClientOriginalExtension();
        $name= "$object-".uniqid().".$ext";
        $filePath = "uploads/$object/".$name;
        $path = Storage::put($filePath, file_get_contents($file));
        return ['path'=>$filePath,'name'=>$name];
    }

    public static function updateFile ($oldFile , $newFile , $object)
    {
        $ext = $newFile->getClientOriginalExtension();
        $Contentimagename= "$object-".uniqid().".$ext";
        $filePath = "uploads/$object/".$Contentimagename;
        $path = Storage::put($filePath, file_get_contents($newFile));
        if (Storage::exists($oldFile)) {
            Storage::delete($oldFile);
        }

        return ['path'=>$filePath,'name'=>$Contentimagename];
    }

    public static function deleteFile($fileName , $object)
    {
        // dd(Storage::exists("uploads/$object/".$fileName));
        if (Storage::exists($fileName)) {
            Storage::delete($fileName);
        }
        return true;
    }

    public static function tempLink($file,$folder,$minutes = 10)
    {
        return Storage::temporaryUrl("uploads/$folder/$file", now()->addMinutes($minutes));
    }

    public static function download($file,$folder)
    {
        return Storage::download("uploads/$folder/$file");
    }
}