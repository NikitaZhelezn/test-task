<?php

namespace App\Services;



use Illuminate\Http\UploadedFile;

interface FileContract
{
    /**
     * @param \Illuminate\Http\UploadedFile $file
     * @return mixed
     */
    public function save(UploadedFile $file);
}
