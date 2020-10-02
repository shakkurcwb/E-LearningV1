<?php

namespace App\Services\Merchant\Subscriptions;

use  Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Merchant\SubscriptionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListSubscriptionsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return  Illuminate\Pagination\LengthAwarePaginator
     */
    public function execute(): ?LengthAwarePaginator
    {
        try {

            $id = $this->getParameter('user_id');

            return SubscriptionModel::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->paginate(4);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}