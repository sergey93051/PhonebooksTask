<?php

namespace App\Services\Auth;

use App\Models\User;
use App\Repository\Auth\UsersRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserService implements UsersRepositoryInterface
{
    private Model $query;

    public function __construct(User $user)
    {
        $this->query = $user;
    }

    /**
     *
     * @param object|array $usersDetails
     *
     * @return \Illuminate\Database\Eloquent\Model
     *
     */

    public function  createUser(object | array  $usersDetails):Model
    {

        try {
            return  $this->query->create([
                'email' => $usersDetails->email,
                'password' => bcrypt($usersDetails->password)
            ]);

        } catch (QueryException $e) {

            throw new HttpResponseException(response()->json([
                'error' => $e->getMessage()
            ],400));
        }
    }

    /**
     *
     * @param object $user
     *
     * @return array $createToken
     *
     */

    public function createToken(object $user): array
    {

        $success['_token'] = $user->createToken('authToken')->accessToken;
        $success['_email'] = $user->email;

        return $success;
    }
}
