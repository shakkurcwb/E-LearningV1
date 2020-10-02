<?php

namespace App\Http\Controllers\Merchant\Coupons\API;

use Illuminate\Http\Request;

use App\Models\Merchant\CouponModel;

use App\Http\Controllers\Controller;

class GetCouponBySlugController extends Controller
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
        $slug = $this->request->input('slug', null);

        $coupons = CouponModel::where('slug', $slug)
            ->where('expires_at', '>=', now())
            ->get();

        if ($coupons->count() === 0)
        {
            return $this->json([], 404);
        }

        return $this->json($coupons->first()->toArray());
    }
}
