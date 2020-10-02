<?php

namespace App\Services\Account\Notifications;

use Illuminate\Notifications\DatabaseNotification;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ReadNotificationService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return DatabaseNotification
     */
    public function execute(): ?DatabaseNotification
    {
        try {

            $id = $this->getParameter('user_id');
            $uuid = $this->getParameter('uuid');

            $user = UserModel::findOrFail($id);

            $notification = $user->notifications->where('id', $uuid)->first();

            $notification->markAsRead();
            $notification->refresh();

            return $notification;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}