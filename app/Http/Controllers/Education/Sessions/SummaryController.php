<?php

namespace App\Http\Controllers\Education\Sessions;

use Illuminate\Http\Request;

use App\Services\Education\Sessions\GetSessionService;

use App\Http\Controllers\Controller;

class SummaryController extends Controller
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
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id)
    {
        $svc = new GetSessionService();
        $svc->setParameters([ 'session_id' => $id ]);
        $session = $svc->execute();

        return $this->view("education.sessions.summary", [
            'session' => $session,
        ]);
    }
}
