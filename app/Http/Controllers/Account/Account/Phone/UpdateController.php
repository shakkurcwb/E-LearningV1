<?php

namespace App\Http\Controllers\Account\Account\Phone;

use Illuminate\Http\Request;

use App\Services\Account\Phones\UpdatePhoneService;

use App\Events\Account\PhoneUpdatedEvent;

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
            'country_prefix' => [ 'nullable', 'string', 'max:8' ],
            'prefix' => [ 'required', 'string', 'max:8' ],
            'phone' => [ 'required', 'string', 'max:12' ],
            'allow_messages' => [ 'nullable', 'boolean' ],
        ];
    
        $messages = [
            'country_prefix' => __('account.attributes.phone.country_prefix'),
            'prefix' => __('account.attributes.phone.prefix'),
            'phone' => __('account.attributes.phone.phone'),
            'allow_messages' => __('account.attributes.phone.allow_messages'),
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

            # Update Phone
            $svc = new UpdatePhoneService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new PhoneUpdatedEvent($user));

            return $this->redirect('/account')->with('success', __('account.alerts.account.phone.update_success'));

        } catch (\Exception $e) {
            
            return $this->redirect('/account')->with('error', __('account.alerts.account.person.update_failed'));

        }
    }
}