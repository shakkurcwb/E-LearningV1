<?php

namespace App\Services\Merchant\Coupons;

use Illuminate\Database\Eloquent\Collection;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class ListCouponsService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return Illuminate\Database\Eloquent\Collection;
     */
    public function execute(): ?Collection
    {
        try {

            return CouponModel::all();

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}