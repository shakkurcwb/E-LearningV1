<?php

namespace App\Http\Controllers\Merchant\Coupons;

use Illuminate\Http\Request;

use App\Services\Merchant\Coupons\UpdateCouponService;

use App\Http\Controllers\ActionController;

class UpdateController extends ActionController
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
        $svc = new UpdateCouponService;
        $svc->setParameters([ 'coupon_id' => $id ]);
        $svc->setAttributes($attributes);
        $coupon = $svc->execute();

        if (!$coupon)
        {
            return $this->redirect('/coupons')
                ->with('error', __('merchant.alerts.coupons.update_failed'));
        }

        return $this->redirect('/coupons')
            ->with('success', __('merchant.alerts.coupons.update_success'));
    }
}