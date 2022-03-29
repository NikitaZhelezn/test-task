<?php

namespace App\Services;

use App\Models\File;
use App\Repositories\FileRepository;
use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileStorage implements FileContract
{
    public function __construct()
    {
        $this->fileRepository = new FileRepository();
    }

    const DIRECTORY = 'files';

    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @return mixed|void
     */
    public function save(UploadedFile $file)
    {

        $size = $file->getSize();
        $filename = $file->getClientOriginalName();
        $type = $file->getClientMimeType();
        $fileModel = $this->fileRepository->fetchOne($filename, $size);

        Storage::disk('local')->putFileAs(self::DIRECTORY, $file, $filename);

        if (!$fileModel) {
            File::create(
                [
                    'name' => $filename,
                    'type' => $type,
                    'size' => $size
                ]
            );

        } else {
            $fileModel->updated_at = Carbon::now();
            $fileModel->save();
        }
    }
}
