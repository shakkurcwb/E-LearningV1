<?php

namespace App\Services\Merchant\Coupons;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class StoreCouponService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return CouponModel
     */
    public function execute(): ?CouponModel
    {
        try {

            $attributes = $this->getAttributes();

            $coupon = CouponModel::create($attributes);

            return $coupon;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}