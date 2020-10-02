<?php

namespace App\Services\Account\BankAccounts;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdateBankAccountService extends Service implements ServiceContract
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
            $user->bank_account->update($attributes);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}