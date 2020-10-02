<?php

namespace App\Http\Controllers\Account\Profile;

use Illuminate\Http\Request;

use App\Services\Account\Users\GetUserService;

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
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        if (!$id)
        {
            $id = $this->request->user()->id;
        }

        $svc = new GetUserService;
        $svc->setParameters([ 'user_id' => $id ]);
        $user = $svc->execute();

        return $this->view('account.profile.index', [
            'user' => $user,
        ]);
    }
}
