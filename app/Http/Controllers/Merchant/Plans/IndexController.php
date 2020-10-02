<?php

namespace App\Http\Controllers\Merchant\Plans;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\ListPlansService;
use App\Services\Merchant\Plans\GetPlanService;

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
     */
    public function __invoke(int $id = null)
    {
        // Specific Plan
        $plan = null;

        if ($id)
        {
            $svc = new GetPlanService;
            $svc->setParameters([ 'plan_id' => $id ]);
            $plan = $svc->execute();
        }

        // All Plans
        $svc = new ListPlansService;
        $plans = $svc->execute();

        return $this->view('merchant.plans.index', [
            'plans' => $plans,
            'plan' => $plan,
        ]);
    }
}
