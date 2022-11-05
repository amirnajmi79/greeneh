<?php

namespace App\Services\Auth;

use App\Models\Shopkeeper;
use App\Models\User;
use App\Services\BaseService;

class RegisterService extends BaseService
{

    public function createShopkeeper(User $user)
    {
        return Shopkeeper::create([
            'user_id' => $user->id
        ]);
    }
}
