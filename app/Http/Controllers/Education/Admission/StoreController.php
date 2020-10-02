<?php

namespace App\Http\Controllers\Education\Admission;

use Illuminate\Http\Request;

use App\Services\Education\Admissions\StoreAdmissionService;

use App\Jobs\Education\Admissions\ProcessAdmissionJob;

use App\Http\Controllers\ActionController;

class StoreController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('inactive');

        parent::__construct($request);
    }

    /**
     * Execute controller main action.
     *
     */
    public function __invoke()
    {
        // Preparing Validator
        $rules = [
            'form_id' => [ 'required', 'exists:forms,id' ],
            'form.*' => [ 'required', 'array' ],
            'form.*.question_id' => [ 'required', 'exists:questions,id'],
            'form.*.answer' => [ 'required' ],
        ];

        $messages = [
            'form.*.answer' => '',
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);
        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        // Custom Attributes
        $attributes['user_id'] = $this->request->user()->id;

        try {

            # Store Admission
            $svc = new StoreAdmissionService;
            $svc->setAttributes($attributes);
            $admission = $svc->execute();

            // Trigger Job
            dispatch(new ProcessAdmissionJob($admission));

            return $this->redirect('/home')->with('success', __('education.alerts.admissions.store_success'));

        } catch (\Exception $e) {

            return $this->redirect('/admission')->with('error', __('education.alerts.admissions.store_failed'));

        }
    }
}