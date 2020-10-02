<?php

namespace App\Http\Controllers\Education\Admission;

use Illuminate\Http\Request;

use App\Libraries\Account\Users\Role;

use App\Services\Education\Forms\GetFormService;

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
        $this->middleware('inactive');

        $this->request = $request;
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        if (!$this->request->user()->person->isFilled())
        {
            return redirect('/account')->with('warning', __('education.alerts.admission.person_incomplete'));
        }

        $svc = new GetFormService();

        if ($this->request->user()->role === Role::STUDENT)
        {
            $svc->setParameters([ 'form_id' => 1 ]);
            $form = $svc->execute();
        }

        if ($this->request->user()->role === Role::TUTOR)
        {
            $svc->setParameters([ 'form_id' => 2 ]);
            $form = $svc->execute();
        }

        return $this->view("education.admission.index", [
            'form' => $form,
        ]);
    }
}
