<?php

namespace App\Http\Controllers\Account\Users;

use Illuminate\Http\Request;

use App\Services\Account\Users\DestroyUserService;

use App\Http\Controllers\ActionController;

class DestroyController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin');

        parent::__construct($request);
    }

    /**
     * Execute controller main action.
     *
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        try {

            // Execute Service(s)
            $svc = new DestroyUserService;
            $svc->setParameters([ 'user_id' => $id ]);
            $svc->execute();

            return $this->redirect('/users')->with('success', __('account.alerts.users.destroy_success'));

        } catch (\Exception $e) {

            return $this->redirect('/users')->with('error', __('account.alerts.users.destroy_error'));
        }
    }
}
