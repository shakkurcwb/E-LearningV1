<?php

namespace App\Http\Controllers\Merchant\Subscriptions;

use Illuminate\Http\Request;

use App\Services\Merchant\Subscriptions\ListSubscriptionsService;
use App\Services\Merchant\Subscriptions\GetSubscriptionService;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('student');
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param  Integer  $id
     */
    public function __invoke(Int $id = null)
    {
        // Specific Subscription
        $subscription = null;

        if ($id)
        {
            $svc = new GetSubscriptionService;
            $svc->setParameters([ 'subscription_id' => $id ]);
            $subscription = $svc->execute();
        }

        // All Subscriptions
        $svc = new ListSubscriptionsService;
        $svc->setParameters([ 'user_id' => $this->request->user()->id ]);
        $subscriptions = $svc->execute();

        return $this->view('merchant.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'subscription' => $subscription,
        ]);
    }
}
