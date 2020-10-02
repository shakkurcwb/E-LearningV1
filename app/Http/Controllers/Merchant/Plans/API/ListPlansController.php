<?php

namespace App\Http\Controllers\Merchant\Plans\API;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\ListPlansService;

use App\Http\Controllers\Controller;

class ListPlansController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->middleware('verified');
        $this->middleware('student');
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        // Get Plans
        $svc = new ListPlansService;
        $plans = $svc->execute();

        return $this->json($plans->toArray());
    }
}
