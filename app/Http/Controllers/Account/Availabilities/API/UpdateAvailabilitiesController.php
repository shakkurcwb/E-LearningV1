<?php

namespace App\Http\Controllers\Account\Availabilities\API;

use Illuminate\Http\Request;

use App\Events\Account\AvailabilitiesUpdatedEvent;

use App\Http\Controllers\Controller;

class UpdateAvailabilitiesController extends Controller
{
    private $request;

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:api');
        $this->middleware('verified');
        $this->middleware('tutor');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     * @param Integer $id
     */
    public function __invoke()
    {
        $user = $this->request->user();

        // Attributes
        $availabilities = $this->request->input('availabilities', []);

        // Update Model
        $user->preferences->availabilities = $availabilities;
        $user->preferences->save();

        // Trigger Event
        event(new AvailabilitiesUpdatedEvent($user));

        return $this->json($availabilities);
    }
}
