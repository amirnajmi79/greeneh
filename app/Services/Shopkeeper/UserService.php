<?php

namespace App\Services\Shopkeeper;

use App\Http\Requests\Shopkeeper\User\UpdateRequest;
use App\Models\Shopkeeper;
use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function updateUser(Shopkeeper $shopkeeper,UpdateRequest $request)
    {
        $updated = $shopkeeper
                        ->update($request->all());
                        
        return $this->successResponse($shopkeeper, 'updated success');
    }
}
