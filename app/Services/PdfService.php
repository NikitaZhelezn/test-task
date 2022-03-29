<?php

namespace App\Services;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PdfService implements PdfContract
{
    /**
     * @param string $word
     * @return bool
     */
    public function isContain(UploadedFile $file, string $word): bool
    {
        return true;
    }
}
