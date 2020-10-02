<?php

namespace App\Services\Merchant\Subscriptions;

use App\Models\Merchant\SubscriptionModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetSubscriptionService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return SubscriptionModel
     */
    public function execute(): ?SubscriptionModel
    {
        try {

            $id = $this->getParameter('subscription_id');

            return SubscriptionModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}