<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    public RegisterService $registerService;

    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        $this->registerService->createShopkeeper($user);
        $tokenResult = $user->createToken('Personal Access Token ');

        return $this->registerService->successResponse([
            'user' => [
                'name' => $user->name,
                'email' => $user->email
            ],
            'access_token' => $tokenResult->plainTextToken,
        ]);
    }
}
