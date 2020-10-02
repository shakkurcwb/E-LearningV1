<?php

namespace App\Http\Controllers\Merchant\Coupons;

use Illuminate\Http\Request;

use App\Services\Merchant\Coupons\DestroyCouponService;

use App\Http\Controllers\ActionController;

class DestroyController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');

        parent::__construct($request);
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        // Execute Service(s)
        $svc = new DestroyCouponService;
        $svc->setParameters([ 'coupon_id' => $id ]);
        $coupon = $svc->execute();

        if (!$coupon)
        {
            return $this->redirect('/coupons')
                ->with('error', __('merchant.alerts.coupons.destroy_error'));
        }

        return $this->redirect('/coupons')
            ->with('success', __('merchant.alerts.coupons.destroy_success'));
    }
}
