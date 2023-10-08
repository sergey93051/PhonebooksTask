<?php

namespace App\Repository\Auth;

use Illuminate\Database\Eloquent\Model;

    /**
     *
     * @param object $usersDetails
     *
    */

interface UsersRepositoryInterface
{
     public function createUser(object | array $usersDetails):Model;

     public function createToken(object $user);
}
