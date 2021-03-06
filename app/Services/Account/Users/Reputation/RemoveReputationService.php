<?php

namespace App\Services\Account\Users\Reputation;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class RemoveReputationService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return UserModel
     */
    public function execute(): ?UserModel
    {
        try {

            $id = $this->getParameters('user_id');
            $amount = $this->getAttributes('amount') ?? 1;

            $user = UserModel::findOrFail($id);
            $user->decrement('reputation', $amount);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}