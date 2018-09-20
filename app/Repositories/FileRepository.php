<?php
namespace App\Repositories;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class FileRepository
{
	public function saveFile(UploadedFile $file, $id, $type)
	{
		if ($file->isValid())
		{
			$file = $file;
			$extension = $file->getClientOriginalExtension();
			$fileName = time() . random_int(100, 999) .'.' . $extension;
			$destinationPath = $type.'/'.$id;
			$fullPath = $destinationPath.$fileName;

			$path = $file->storePubliclyAs($destinationPath, $fileName, 'public');

			return $path;
		} else {
			return false;
		}
	}

	public function saveThumbnail(UploadedFile $image, $id, $type, $size = 300)
	{
		if ($image->isValid())
		{
			$file = $image;
			$extension = $image->getClientOriginalExtension();
			$fileName = time() . random_int(100, 999) .'.' . $extension;
			$destinationPath = storage_path('app/public/'.$type.'/'.$id);
			$url = 'http://'.$_SERVER['HTTP_HOST'].'/files/'.$type.'/'.$id.'/'.$fileName;
			$fullPath = $destinationPath.$fileName;
			if (!file_exists($destinationPath)) {
				File::makeDirectory($destinationPath, 0775, true);
			}

			$image = Image::make($file);
			if(!is_null($size)) {
				$image->resize($size, null, function ($constraint) {
					$constraint->aspectRatio();
				});
			}
			$image->encode('jpg');

			$image->save($fullPath, 100);
			return $url;
		} else {
			return false;
		}
	}
}