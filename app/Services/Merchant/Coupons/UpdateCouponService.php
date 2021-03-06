<?php

namespace App\Services\Merchant\Coupons;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class UpdateCouponService extends Service implements ServiceContract
{
    /**
     * Execute Service.
     * 
     * @return CouponModel
     */
    public function execute(): ?CouponModel
    {
        try {

            $id = $this->getParameter('coupon_id');

            $attributes = $this->getAttributes();

            $coupon = CouponModel::findOrFail($id);
            $coupon->update($attributes);
            $coupon->refresh();

            return $coupon;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}