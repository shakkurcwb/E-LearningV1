<?php

namespace App\Services\Account\Users;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class DestroyUserService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return UserModel
     */
    public function execute(): ?UserModel
    {
        try {

            $id = $this->getParameter('user_id');

            $user = UserModel::findOrFail($id);
            $user->delete();
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}