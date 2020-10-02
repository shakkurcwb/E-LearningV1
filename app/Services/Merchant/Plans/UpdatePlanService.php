<?php

namespace App\Services\Merchant\Plans;

use Illuminate\Support\Arr;

use App\Models\Merchant\PlanModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdatePlanService extends Service implements ServiceContract
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

            $attributes = $this->getAttributes();

            // Fix Boolean Value
            if (!array_key_exists('is_recommended', $attributes))
            {
                $attributes['is_recommended'] = false;
            }

            $plan_attr = Arr::except($attributes, [
                'credits', 'frequency', 'duration',
            ]);

            $feature_attr = Arr::only($attributes, [
                'credits', 'frequency', 'duration',
            ]);

            $plan = PlanModel::findOrFail($id);
            $plan->update($plan_attr);
            $plan->features->update($feature_attr);
            $plan->refresh();

            return $plan;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}