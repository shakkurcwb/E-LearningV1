<?php

namespace App\Http\Controllers\Merchant\Plans;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\StorePlanService;

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
            'name' => [ 'required', 'string', 'max:32' ],
            'price' => [ 'required', 'numeric' ],
            'interval' => [ 'required', 'string', 'max:32' ],
            'frequency' => [ 'required', 'string', 'max:32' ],
            'duration' => [ 'required', 'string', 'max:16' ],
            'credits' => [ 'required', 'numeric' ],
            'is_recommended' => [ 'nullable', 'boolean' ],
        ];

        $messages = [
            'name' => __('merchant.attributes.plan.name'),
            'price' => __('merchant.attributes.plan.price'),
            'interval' => __('merchant.attributes.plan.interval'),
            'frequency' => __('merchant.attributes.features.frequency'),
            'duration' => __('merchant.attributes.features.duration'),
            'credits' => __('merchant.attributes.features.credits'),
            'is_recommended' => __('merchant.attributes.plan.is_recommended'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);
        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Execute Service(s)
        $svc = new StorePlanService;
        $svc->setAttributes($attributes);
        $plan = $svc->execute();

        if (!$plan)
        {
            return $this->redirect('/plans')
                ->with('error', __('merchant.alerts.plans.store_failed'));
        }

        return $this->redirect('/plans')
            ->with('success', __('merchant.alerts.plans.store_success'));
    }
}