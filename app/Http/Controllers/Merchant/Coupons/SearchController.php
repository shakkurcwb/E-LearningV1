<?php

namespace App\Http\Controllers\Merchant\Coupons;

use Illuminate\Http\Request;

use App\Services\Merchant\Coupons\SearchCouponsService;

use App\Http\Controllers\ActionController;

class SearchController extends ActionController
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
        $query = $this->request->input('q');

        // Clear Search
        if (empty($query)) return $this->redirect('/coupons');

        // Execute Service(s)
        $svc = new SearchCouponsService;
        $svc->setAttributes([ 'query' => $query ]);
        $coupons = $svc->execute();

        return $this->view('merchant.coupons.index', [
            'coupons' => $coupons,
        ]);
    }
}
