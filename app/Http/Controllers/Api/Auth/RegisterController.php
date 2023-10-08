<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\Auth\RegisterResource;
use App\Repository\Auth\UsersRepositoryInterface;

class RegisterController extends Controller
{

    /**
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @param \App\Repository\Auth\UsersRepositoryInterface $usersRepository
     *
     * @return \App\Http\Resources\Auth\RegisterResource
     *
     */

    public function __invoke(RegisterRequest $request, UsersRepositoryInterface $usersRepository)
    {
        $usersRepository->createUser((object)$request->all());

        return new RegisterResource([
            'success' => "created"
        ]);
    }
}
