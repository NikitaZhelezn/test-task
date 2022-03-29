<?php

namespace App\Services;

use App\Exceptions\Services\PdfFileNoContainWordException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class PdfUploaderService
{

    /**
     * @var \App\Services\PdfContract
     */
    private $pdfService;

    /**
     * @var FileContract
     */
    private $fileStorage;

    public function __construct(PdfContract $pdfService, FileContract $fileStorage)
    {
        $this->pdfService = $pdfService;
        $this->fileStorage = $fileStorage;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file
     * @param string $word
     * @return void
     * @throws \App\Exceptions\Services\PdfFileNoContainWordException
     */
    public function upload(UploadedFile $file, string $word="Proposal")
    {

        if (!$this->pdfService->isContain($file, $word)) {
            throw new PdfFileNoContainWordException("file doesn't contain the word '$word'");
        }

        $this->fileStorage->save($file);

    }
}
