<?php

namespace App\Http\Controllers\Account\Users;

use Illuminate\Http\Request;

use App\Services\Account\Users\SearchUsersService;

use App\Http\Controllers\ActionController;

class SearchController extends ActionController
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
     */
    public function __invoke()
    {
        $query = $this->request->input('q');

        // Clear Search
        if (empty($query)) { return $this->redirect('/users'); }

        // Execute Service(s)
        $svc = new SearchUsersService;
        $svc->setAttributes([ 'query' => $query ]);
        $users = $svc->execute();

        return $this->view('account.users.index', [
            'users' => $users,
        ]);
    }
}
