<?php

namespace App\Services\Account\Notifications;

use App\Models\Account\UserModel;

use Illuminate\Database\Eloquent\Collection;

use App\Services\Service;
use App\Services\ServiceContract;

class ReadAllNotificationsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function execute(): ?Collection
    {
        try {

            $id = $this->getParameter('user_id');

            $user = UserModel::findOrFail($id);

            $user->unreadNotifications->markAsRead();
            $user->refresh();

            return $user->notifications;

        } catch(\Exception $e) { dd($e); $this->report($e); }

        return null;
    }
}