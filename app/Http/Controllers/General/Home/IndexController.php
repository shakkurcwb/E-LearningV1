<?php

namespace App\Http\Controllers\General\Home;

use Illuminate\Http\Request;

use App\Libraries\Account\Users\State;

use App\Http\Controllers\Controller;

class IndexController extends Controller
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

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(): \Illuminate\Http\Response
    {
        $user = $this->request->user();

        if ($user->state === State::ACTIVE)
        {
            $role = strtolower($user->role);
            return $this->view("general.home.{$role}");
        }

        if ($user->state === State::BANNED)
        {
            return $this->view('general.home.banned');
        }

        return $this->view("general.home.inactive");
    }
}
