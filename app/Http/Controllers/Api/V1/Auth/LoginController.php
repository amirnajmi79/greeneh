<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->errorResponse(['message' => 'Unauthorized'], 'unauthorized', 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token ');


        return $this->successResponse([
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ],
            'access_token' => $tokenResult->plainTextToken,
        ]);
    }
}
