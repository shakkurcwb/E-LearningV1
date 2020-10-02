<?php

namespace App\Http\Controllers\Merchant\Coupons;

use Illuminate\Http\Request;

use App\Services\Merchant\Coupons\GetCouponService;
use App\Services\Merchant\Coupons\ListCouponsService;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        // Specific Coupon
        $coupon = null;

        if ($id)
        {
            $svc = new GetCouponService;
            $svc->setParameters([ 'coupon_id' => $id ]);
            $coupon = $svc->execute();
        }

        // All Coupons
        $svc = new ListCouponsService;
        $coupons = $svc->execute();

        return $this->view('merchant.coupons.index', [
            'coupons' => $coupons,
            'coupon' => $coupon,
        ]);
    }
}
