<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\LoginService;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return $this->loginService->errorResponse(['message' => 'Unauthorized'], 'unauthorized', 401);
        }

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token ');


        return $this->loginService->successResponse([
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ],
            'access_token' => $tokenResult->plainTextToken,
        ]);
    }
}
