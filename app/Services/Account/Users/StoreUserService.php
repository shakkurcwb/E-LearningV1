<?php

namespace App\Services\Account\Users;

use App\Libraries\Account\Users\Role;
use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreUserService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return UserModel
     */
    public function execute(): ?UserModel
    {
        try {

            $attributes = $this->getAttributes();

            $user = UserModel::create($attributes);

            $user->settings()->create($attributes['settings'] ?? []);
            $user->preferences()->create($attributes['preferences'] ?? []);
            $user->person()->create($attributes['person'] ?? []);
            $user->address()->create($attributes['address'] ?? []);
            $user->phone()->create($attributes['phone'] ?? []);
            $user->bank_account()->create($attributes['bank_account'] ?? []);

            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}