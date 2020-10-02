<?php

namespace App\Http\Controllers\Merchant\Subscribe\API;

use Illuminate\Http\Request;

use App\Events\Merchant\SubscriptionRequestedEvent;

use App\Services\Merchant\Subscriptions\StoreSubscriptionService;
use App\Services\Merchant\Invoices\StoreInvoiceService;

use App\Http\Controllers\ActionController;

class SubscribePlanController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request) {

        $this->middleware('auth:api');
        $this->middleware('verified');
        $this->middleware('student');
        $this->middleware('active');

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
            'plan_id' => [ 'required', 'numeric', 'exists:plans,id' ],
            'coupon_id' => [ 'nullable', 'numeric', 'exists:coupons,id' ],
            'quantity' => [ 'required', 'numeric' ],
            'method' => [ 'required', 'string', 'in:credit_card,bank_slip' ],
            'cc_token' => [ 'nullable', 'string' ],
        ];

        $messages = [
            'plan_id' => __('merchant.attributes.plan.id'),
            'coupon_id' => __('merchant.attributes.coupon.id'),
            'quantity' => __('merchant.attributes.subscription.quantity'),
            'method' => __('merchant.attributes.invoice.method'),
            'cc_token' => __('merchant.attributes.invoice.cc_token'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);
        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Custom Attributes
        $attributes['user_id'] = $this->request->user()->id;

        try {

            // Execute Service(s)

            # Subscription
            $svc = new StoreSubscriptionService;
            $svc->setAttributes($attributes);
            $subscription = $svc->execute();

            // Custom Attributes
            $attributes['subscription_id'] = $subscription->id;

            # Invoice
            $svc = new StoreInvoiceService;
            $svc->setAttributes($attributes);
            $invoice = $svc->execute();

            // Trigger Event
            event(new SubscriptionRequestedEvent($subscription));

            return $this->json($invoice->toArray(), 201);

        } catch (\Exception $e) {

            return $this->json([], 400);

        }
    }
}