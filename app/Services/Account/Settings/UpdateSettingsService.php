<?php

namespace App\Services\Account\Settings;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdateSettingsService extends Service implements ServiceContract
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
            if (!array_key_exists('allow_newsletters', $attributes))
            {
                $attributes['allow_newsletters'] = false;
            }

            if (!array_key_exists('show_hints', $attributes))
            {
                $attributes['show_hints'] = false;
            }

            $user = UserModel::findOrFail($id);
            $user->settings->update($attributes);
            $user->refresh();

            return $user;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}