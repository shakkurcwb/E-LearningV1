<?php

namespace App\Services\Account\People;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdatePersonService extends Service implements ServiceContract
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

            $attributes = $this->getAttributes();

            $user = UserModel::findOrFail($id);
            $user->person->update($attributes);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}