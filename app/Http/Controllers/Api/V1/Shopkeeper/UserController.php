<?php

namespace App\Http\Controllers\Api\V1\Shopkeeper;

use App\Http\Controllers\Api\V1\BaseController;
use App\Http\Requests\Shopkeeper\User\UpdateRequest;
use App\Models\User;
use App\Services\Shopkeeper\UserService;


class UserController extends BaseController
{
    public UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function update(User $user, UpdateRequest $request)
    {
        return $this->userService->updateUser($user,$request);
    }
}
