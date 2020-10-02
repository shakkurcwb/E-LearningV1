<?php

namespace App\Services\Merchant\Coupons;

use App\Models\Merchant\CouponModel;

use App\Services\Service;
use App\Services\ServiceContract;

class GetCouponService extends Service implements ServiceContract
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

            return CouponModel::findOrFail($id);

        } catch(\Exception $e) { $this->report($e); }

        return null;
    }
}