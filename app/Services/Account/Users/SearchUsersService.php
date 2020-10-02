<?php

namespace App\Services\Account\Users;

use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Account\UserModel;

use App\Services\Service;
use App\Services\ServiceContract;

class SearchUsersService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            $query = $this->getAttribute('query');

            $builder = UserModel::where('email', 'like', "%{$query}%")
                ->orWhere('name', 'like', "%{$query}%")
                ->orWhere('role', 'like', "%{$query}%")
                ->orWhere('state', 'like', "%{$query}%")
                ->orWhereHas('person', function ($b) use ($query) {
                    $b->where('first_name', 'like', "%{$query}%");
                    $b->orWhere('last_name', 'like', "%{$query}%");
                });

            return $builder->paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}