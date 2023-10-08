<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\Auth\LoginResource;
use App\Repository\Auth\UsersRepositoryInterface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

     /**
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     *
     * @param \App\Repository\Auth\UsersRepositoryInterface $usersRepository
     *
     * @return \App\Http\Resources\Auth\LoginResource
     *
     */

    public function __invoke(LoginRequest $request, UsersRepositoryInterface $usersRepository)
    {

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'error' => 'Unauthorised'
            ], 401));
        }

        return new LoginResource([
            'success'   => true,
            "token"  => $usersRepository->createToken(Auth::user())
        ]);
    }
}
