<?php

namespace App\Http\Controllers\Account\Users;

use Illuminate\Http\Request;

use App\Services\Account\Users\ListUsersService;
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
        $this->middleware('admin');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param int $id
     */
    public function __invoke(int $id = null)
    {
        // Specific User
        $user = null;

        if ($id)
        {
            $svc = new GetUserService;
            $svc->setParameters([ 'user_id' => $id ]);
            $user = $svc->execute();
        }

        // All Users
        $svc = new ListUsersService;
        $users = $svc->execute();

        return $this->view('account.users.index', [
            'users' => $users,
            'user' => $user,
        ]);
    }
}
