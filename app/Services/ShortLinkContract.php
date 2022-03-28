<?php

namespace App\Services;

interface ShortLinkContract
{
    /**
     * @param string $hash
     * @return string
     */
    public function get(string $hash): string;

    /**
     * @param string $link
     * @return mixed
     */
    public function generate(string $link);

}
