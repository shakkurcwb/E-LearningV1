<?php

namespace App\Http\Controllers\Merchant\Plans;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\DestroyPlanService;

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
        $svc = new DestroyPlanService;
        $svc->setParameters([
            'plan_id' => $id,
        ]);
        $plan = $svc->execute();

        if (!$plan)
        {
            return $this->redirect('/plans')->with('error', __('merchant.alerts.plans.destroy_error'));
        }

        return $this->redirect('/plans')
            ->with('success', __('merchant.alerts.plans.destroy_success'));
    }
}
