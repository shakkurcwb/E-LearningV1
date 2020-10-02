<?php

namespace App\Services\Account\Notifications;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListNotificationsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            $id = $this->getParameter('user_id');

            $user = UserModel::findOrFail($id);

            return $user->notifications()->paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}