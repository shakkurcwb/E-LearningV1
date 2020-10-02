<?php

namespace App\Services\Merchant\Plans;

use Illuminate\Support\Arr;

use App\Models\Merchant\PlanModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StorePlanService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return PlanModel
     */
    public function execute(): ?PlanModel
    {
        try {

            $attributes = $this->getAttributes();

            $plan_attr = Arr::except($attributes, [
                'credits', 'frequency', 'duration',
            ]);

            $feature_attr = Arr::only($attributes, [
                'credits', 'frequency', 'duration',
            ]);

            $plan = PlanModel::create($plan_attr);
            $plan->features()->create($feature_attr);
            $plan->refresh();

            return $plan;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}