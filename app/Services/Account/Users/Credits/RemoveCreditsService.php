<?php

namespace App\Services\Account\Users\Credits;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class RemoveCreditsService extends Service implements ServiceContract
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
            $user->decrement('credits', $amount);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}