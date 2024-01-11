
 $path='https://res.cloudinary.com/dzrc27udp/image/upload/v1704962274/20240111154256.jpg';
        $this->deleteFile($path);
         $file = $request->file('img_post');
         $filedata=$this->uploads($file);
         echo $filedata['filePath'];
<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function uploads($file)
    {
        if ($file) {
            $fileName = date('YmdHis').'.'.$file->getClientOriginalExtension();
            Storage::disk('cloudinary')->put($fileName, File::get($file));          
            return [
                'filePath' => Storage::url($fileName),
                'fileSize' => $this->fileSize($file),
            ];
        }
    }

    public function fileSize($file, $precision = 2)
    {
        $size = $file->getSize();

        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        }

        return $size;
    }

    public function deleteFile($path)
    {
        $fileName=pathinfo($path)['basename'];
        if (Storage::disk('cloudinary')->exists($fileName)) {
            Storage::disk('cloudinary')->delete($fileName);
        }
    }
}
