<?php

namespace App\Http\Controllers\Merchant\Coupons;

use Illuminate\Http\Request;

use App\Services\Merchant\Coupons\StoreCouponService;

use App\Http\Controllers\ActionController;

class StoreController extends ActionController
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
     */
    public function __invoke()
    {
        // Preparing Validator
        $rules = [
            'slug' => [ 'required', 'string', 'max:16' ],
            'discount' => [ 'required', 'numeric' ],
            'expires_at' => [ 'required', 'date' ],
        ];

        $messages = [
            'slug' => __('merchant.attributes.coupon.slug'),
            'discount' => __('merchant.attributes.coupon.discount'),
            'expires_at' => __('merchant.attributes.coupon.expires_at'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);

        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Execute Service(s)
        $svc = new StoreCouponService;
        $svc->setAttributes($attributes);
        $coupon = $svc->execute();

        if (!$coupon)
        {
            return $this->redirect('/coupons')
                ->with('error', __('merchant.alerts.coupons.store_failed'));
        }

        return $this->redirect('/coupons')
            ->with('success', __('merchant.alerts.coupons.store_success'));
    }
}