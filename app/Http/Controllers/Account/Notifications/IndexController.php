<?php

namespace App\Http\Controllers\Account\Notifications;

use Illuminate\Http\Request;

use App\Services\Account\Notifications\ListNotificationsService;

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
        $id = $this->request->user()->id;

        // Execute Service(s)
        $svc = new ListNotificationsService;
        $svc->setParameters([ 'user_id' => $id ]);
        $notifications = $svc->execute();

        return $this->view("account.notifications.index", [
            'notifications' => $notifications,
        ]);
    }
}
