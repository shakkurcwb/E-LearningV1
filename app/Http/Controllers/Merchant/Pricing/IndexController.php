<?php

namespace App\Http\Controllers\Merchant\Pricing;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\ListPlansService;

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
        $this->middleware('student');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $svc = new ListPlansService;
        $plans = $svc->execute();

        return $this->view('merchant.pricing.index', [
            'plans' => $plans,
        ]);
    }
}
