<?php

namespace App\Services\Merchant\Coupons;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class SearchCouponsService extends Service implements ServiceContract
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

            $builder = CouponModel::where('slug', 'like', "%{$query}%")
                ->orWhere('discount', 'like', "%{$query}%");

            return $builder->get();

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}