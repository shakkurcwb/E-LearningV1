<?php

namespace App\Http\Controllers\Account\Account\Person;

use Illuminate\Http\Request;

use App\Services\Account\People\UpdatePersonService;

use App\Events\Account\PersonUpdatedEvent;

use App\Http\Controllers\ActionController;

class UpdateController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request) {

        $this->middleware('auth');
        $this->middleware('verified');

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
            'first_name' => [ 'required', 'string', 'max:32' ],
            'middle_names' => [ 'nullable', 'string', 'max:64' ],
            'last_name' => [ 'required', 'string', 'max:32' ],
            'document' => [ 'required', 'string', 'min:11', 'max:14' ],
            'birth' => [ 'required', 'date' ],
            'gender' => [ 'nullable', 'in:Male,Female' ],
            'nationality' => [ 'nullable', 'string' ],
        ];
    
        $messages = [
            'first_name' => __('account.attributes.person.first_name'),
            'middle_names' => __('account.attributes.person.middle_names'),
            'last_name' => __('account.attributes.person.last_name'),
            'document' => __('account.attributes.person.document'),
            'birth' => __('account.attributes.person.birth'),
            'gender' => __('account.attributes.person.gender'),
            'nationality' => __('account.attributes.person.nationality'),
        ];

        // Validation
        $payload = $this->getPayload();

        $this->setAttributes($payload);

        $this->setValidationRules($rules);
        $this->setValidationMessages($messages);

        $attributes = $this->validateOrFail();

        try {

            // Execute Service(s)
            $parameters = [
                'user_id' => $this->request->user()->id,
            ];

            # Update Person
            $svc = new UpdatePersonService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new PersonUpdatedEvent($user));

            return $this->redirect('/account')->with('success', __('account.alerts.account.person.update_success'));

        } catch (\Exception $e) {
            
            return $this->redirect('/account')->with('error', __('account.alerts.account.person.update_failed'));

        }
    }
}