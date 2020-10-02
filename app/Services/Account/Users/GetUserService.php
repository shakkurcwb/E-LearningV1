<?php

namespace App\Services\Account\Users;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetUserService extends Service implements ServiceContract
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

            return UserModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}