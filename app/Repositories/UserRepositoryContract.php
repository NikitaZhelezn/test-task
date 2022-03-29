<?php

namespace App\Repositories;

interface UserRepositoryContract
{
    /**
     * @param string $country
     */
    public function fetchByCountry(string $country);
}
