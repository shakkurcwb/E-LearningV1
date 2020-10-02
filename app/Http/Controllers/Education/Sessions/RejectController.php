<?php

namespace App\Http\Controllers\Education\Sessions;

use Illuminate\Http\Request;

use App\Services\Education\Sessions\GetSessionService;

use App\Http\Controllers\Controller;

class RejectController extends Controller
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

        try {

            // Approve Session
            $session->state = "Canceled";
            $session->explanation = $this->request->input('explanation', '');
            $session->save();
            $session->refresh();

            return $this->redirect("/sessions/{$id}/summary")->with('success', __('education.alerts.sessions.reject_success'));

        } catch (\Exception $e) {

            return $this->redirect("/sessions/{$id}/summary")->with('error', __('education.alerts.sessions.reject_failed'));

        }
    }
}
