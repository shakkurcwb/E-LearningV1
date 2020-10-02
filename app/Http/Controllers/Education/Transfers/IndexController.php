<?php

namespace App\Http\Controllers\Education\Transfers;

use Illuminate\Http\Request;

use App\Services\Education\Deposits\ListDepositsService;

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

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $svc = new ListDepositsService;
        $transfers = $svc->execute();

        return $this->view('education.transfers.index', [
            'deposits' => $transfers,
        ]);
    }
}
