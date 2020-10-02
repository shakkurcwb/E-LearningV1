<?php

namespace App\Services\Merchant\Plans;

use App\Models\Merchant\PlanModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetPlanService extends Service implements ServiceContract
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

            return PlanModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}