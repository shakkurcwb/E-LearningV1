<?php

namespace App\Http\Controllers\Education\Admissions;

use Illuminate\Http\Request;

use App\Services\Education\Admissions\GetAdmissionService;

use App\Http\Controllers\Controller;

class PreviewController extends Controller
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
     * @param Int $id
     */
    public function __invoke(Int $id)
    {
        $svc = new GetAdmissionService();
        $svc->setParameters([ 'admission_id' => $id ]);
        $admission = $svc->execute();

        return $this->view("education.admissions.preview", [
            'admission' => $admission,
        ]);
    }
}
