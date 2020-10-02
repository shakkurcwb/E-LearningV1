<?php

namespace App\Http\Controllers\Education\Schedule;

use Illuminate\Http\Request;

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
        $this->middleware('active');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        // Profile Incomplete
        if ($this->request->user()->profile_progression !== 100)
        {
            return $this->redirect('/account')->with('warning', __('education.alerts.schedule.profile_incomplete'));
        }

        return $this->view('education.schedule.index');
    }
}
