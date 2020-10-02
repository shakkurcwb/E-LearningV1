<?php

namespace App\Services\Merchant\Plans;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Merchant\PlanModel;

use App\Services\Service;
use App\Services\ServiceContract;

class SearchPlansService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function execute(): ?Collection
    {
        try {

            $query = $this->getAttribute('query');

            $builder = PlanModel::where('name', 'like', "%{$query}%");

            return $builder->get();

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}