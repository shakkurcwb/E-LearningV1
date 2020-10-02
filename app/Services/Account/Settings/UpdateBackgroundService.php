<?php

namespace App\Services\Account\Settings;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdateBackgroundService extends Service implements ServiceContract
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

            $background = $this->getAttribute('background');

            $user = UserModel::findOrFail($id);

            $path = $background->storeAs(
                'backgrounds', $id . '.' . $background->getClientOriginalExtension()
            );

            $user->settings->background = $path;
            $user->settings->save();
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}