<?php

namespace App\Services\Merchant\Plans;

use App\Models\Merchant\PlanModel;

use App\Services\Service;
use App\Services\ServiceContract;

class DestroyPlanService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return PlanModel
     */
    public function execute(): ?PlanModel
    {
        try {

            $id = $this->getParameter('plan_id');

            $plan = PlanModel::findOrFail($id);
            $plan->delete();
            $plan->refresh();

            return $plan;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}