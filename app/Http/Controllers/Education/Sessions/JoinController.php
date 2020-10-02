<?php

namespace App\Http\Controllers\Education\Sessions;

use Illuminate\Http\Request;

use App\Services\Education\Sessions\GetSessionService;

use App\Http\Controllers\Controller;

class JoinController extends Controller
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

        $user = $this->request->user();

        if (!$user->is($session->student) && !$user->is($session->tutor))
        {
            return redirect('/home');
        }

        // Student
        if ($user->is($session->student) && empty($session->live->student_logged_at))
        {
            $session->live->student_logged_at = now();
        }

        // Tutor
        if ($user->is($session->tutor) && empty($session->live->tutor_logged_at))
        {
            $session->live->tutor_logged_at = now();
        }

        // Global
        if (empty($session->live->started_at))
        {
            $session->live->started_at = now();
        }

        $session->live->save();

        $session->refresh();

        return $this->view("education.live.index", [
            'session' => $session,
        ]);
    }
}
