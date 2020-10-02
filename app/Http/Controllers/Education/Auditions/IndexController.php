<?php

namespace App\Http\Controllers\Education\Auditions;

use Illuminate\Http\Request;

use App\Services\Education\Admissions\ListAdmissionsService;

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
        $this->middleware('admin');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        $svc = new ListAdmissionsService();
        $auditions = $svc->execute();

        return $this->view("education.auditions.index", [
            'auditions' => $auditions,
        ]);
    }
}
