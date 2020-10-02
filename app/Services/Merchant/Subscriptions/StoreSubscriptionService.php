<?php

namespace App\Services\Merchant\Subscriptions;

use App\Models\Merchant\SubscriptionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreSubscriptionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return SubscriptionModel
     */
    public function execute(): ?SubscriptionModel
    {
        try {

            $attributes = $this->getAttributes();

            return SubscriptionModel::create($attributes);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}