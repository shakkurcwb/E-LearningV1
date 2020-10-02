<?php

namespace App\Http\Controllers\Account\Notifications;

use Illuminate\Http\Request;

use App\Services\Account\Notifications\ReadNotificationService;

use App\Http\Controllers\Controller;

class ReadController extends Controller
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
     * @param String $uuid
     * @return \Illuminate\Http\Response
     */
    public function __invoke(String $uuid): \Illuminate\Http\RedirectResponse
    {
        $id = $this->request->user()->id;

        try {

            // Execute Service(s)
            $svc = new ReadNotificationService;
            $svc->setParameters([ 'user_id' => $id, 'uuid' => $uuid ]);
            $svc->execute();

            return $this->redirect('/notifications')->with('success', __('account.alerts.notifications.read_success'));

        } catch (\Exception $e) {

            return $this->redirect('/notifications')->with('error', __('account.alerts.notifications.read_failed'));

        }        
    }
}
