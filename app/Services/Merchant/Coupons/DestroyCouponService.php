<?php

namespace App\Services\Merchant\Coupons;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class DestroyCouponService extends Service implements ServiceContract
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

            $coupon = CouponModel::findOrFail($id);
            $coupon->delete();
            $coupon->refresh();

            return $coupon;

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}