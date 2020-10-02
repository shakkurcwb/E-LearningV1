<?php

namespace App\Http\Controllers\Education\Admissions;

use Illuminate\Http\Request;

use App\Services\Education\Admissions\GetAdmissionService;

use App\Jobs\Education\Admissions\ValidateAdmissionJob;

use App\Http\Controllers\Controller;

class RejectController extends Controller
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

        try {

            // Approve Admission
            $admission->is_approved = false;
            $admission->admin_id = $this->request->user()->id;
            $admission->save();
            $admission->refresh();

            // Trigger Job
            dispatch(new ValidateAdmissionJob($admission));

            return $this->redirect('/admissions')->with('success', __('education.alerts.admissions.store_success'));

        } catch (\Exception $e) {

            return $this->redirect('/admissions')->with('success', __('education.alerts.admissions.store_failed'));

        }
    }
}
