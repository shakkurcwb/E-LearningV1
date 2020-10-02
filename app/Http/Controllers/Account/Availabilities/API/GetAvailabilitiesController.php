<?php

namespace App\Http\Controllers\Account\Availabilities\API;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class GetAvailabilitiesController extends Controller
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
        $availabilities = $this->request
            ->user()
            ->preferences
            ->availabilities;

        return $this->json($availabilities ?? []);
    }
}
