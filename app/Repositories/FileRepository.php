<?php

namespace App\Repositories;

use App\Models\File;

class FileRepository
{
    /**
     * @param string $filename
     * @param int $size
     * @return \App\Models\File|null
     */
    public function fetchOne(string $filename, int $size): ?File
    {
        return File::select('id')->where([
            'name' => $filename,
            'size' => $size
        ])->first();
    }
}
