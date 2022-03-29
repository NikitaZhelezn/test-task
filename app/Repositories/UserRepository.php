<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryContract
{
    /**
     * @param string $country
     *
     */
    public function fetchByCountry(string $country)
    {
        return User::select('users.*', 'companies.name', 'countries.name', 'company_users.created_at')
                ->join('company_users', 'company_users.user_id', '=', 'users.id')
                ->join('companies', 'company_users.company_id', '=', 'companies.id')
                ->join('countries', 'companies.country_id', '=', 'countries.id' )
                ->where('countries.name', $country)
                ->get();
    }
}
