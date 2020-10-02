<?php

namespace App\Http\Controllers\Merchant\Subscriptions;

use Illuminate\Http\Request;

use App\Services\Merchant\Subscriptions\GetSubscriptionService;

use App\Jobs\Merchant\ActivateSubscription;

use App\Http\Controllers\Controller;

class ActivateController extends Controller
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
        $this->middleware('student');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        $svc = new GetSubscriptionService;
        $svc->setParameters([ 'subscription_id' => $id ]);
        $subscription = $svc->execute();

        // Job Activate Subscription
        ActivateSubscription::dispatch($subscription);

        return $this->redirect('/subscriptions/' . $subscription->id)->with('info', __('merchant.alerts.subscriptions.activate_success'));
    }
}
