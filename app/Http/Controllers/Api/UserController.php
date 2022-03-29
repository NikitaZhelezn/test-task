<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $userRepository;



    public function __construct()
    {
        //TODO it needs to do via Service Provider, but I don't have time
        $users = $this->userRepository = new UserRepository();

        return $users;
    }

    public function get($country)
    {
       /* try{*/
            $users = $this->userRepository->fetchByCountry($country);

       /* }catch(\Throwable $e){
            //TODO needs to add Service for log errors
            return response()->json('', 422);
        }*/
    }
}
