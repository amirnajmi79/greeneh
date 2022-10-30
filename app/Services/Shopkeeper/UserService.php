<?php

namespace App\Services\Shopkeeper;

use App\Http\Requests\Shopkeeper\User\UpdateRequest;
use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function updateUser(User $user,UpdateRequest $request)
    {
        $user->update($request->all());

        return $this->successResponse($user, 'updated success');
    }
}
