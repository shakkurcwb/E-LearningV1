<?php

namespace App\Services\Account\Settings;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdateAvatarService extends Service implements ServiceContract
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

            $avatar = $this->getAttribute('avatar');

            $user = UserModel::findOrFail($id);

            $path = $avatar->storeAs(
                'avatars', $id . '.' . $avatar->getClientOriginalExtension()
            );

            $user->settings->avatar = $path;
            $user->settings->save();
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}