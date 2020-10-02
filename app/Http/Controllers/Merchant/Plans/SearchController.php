<?php

namespace App\Http\Controllers\Merchant\Plans;

use Illuminate\Http\Request;

use App\Services\Merchant\Plans\SearchPlansService;

use App\Http\Controllers\Controller;

class SearchController extends Controller
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
    public function __invoke()
    {
        $query = $this->request->input('q');

        // Clear Search
        if (empty($query)) return $this->redirect('/plans');

        // Execute Service(s)
        $svc = new SearchPlansService;
        $svc->setAttributes([
            'query' => $query,
        ]);
        $plans = $svc->execute();

        return $this->view('merchant.plans.index', [
            'plans' => $plans,
        ]);
    }
}
