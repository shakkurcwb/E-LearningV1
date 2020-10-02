<?php

namespace App\Services\Account\Users;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListUsersService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            return UserModel::paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}