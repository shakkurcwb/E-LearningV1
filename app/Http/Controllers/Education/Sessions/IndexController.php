<?php

namespace App\Http\Controllers\Education\Sessions;

use Illuminate\Http\Request;

use App\Services\Education\Sessions\ListSessionsService;

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
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $svc = new ListSessionsService;
        $svc->setParameters([ 'user_id' => $this->request->user()->id ]);
        $sessions = $svc->execute();

        return $this->view('education.sessions.index', [
            'sessions' => $sessions,
        ]);
    }
}
