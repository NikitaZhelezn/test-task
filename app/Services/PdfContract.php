<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

interface PdfContract
{
    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param string $word
     * @return bool
     */
    function isContain(UploadedFile $file, string $word): bool;
}
