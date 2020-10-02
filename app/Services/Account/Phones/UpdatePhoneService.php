<?php

namespace App\Services\Account\Phones;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdatePhoneService extends Service implements ServiceContract
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

            // Fix Boolean Value
            if (!array_key_exists('allow_messages', $attributes))
            {
                $attributes['allow_messages'] = false;
            }

            $user = UserModel::findOrFail($id);
            $user->phone->update($attributes);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}