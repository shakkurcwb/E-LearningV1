<?php

namespace App\Http\Controllers\Account\Settings\Background;

use Illuminate\Http\Request;

use App\Services\Account\Settings\UpdateBackgroundService;

use App\Events\Account\BackgroundUpdatedEvent;

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
            'background' => [ 'required', 'file' ],
        ];
    
        $messages = [
            'background' => __('account.attributes.settings.background'),
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

            # Update Background
            $svc = new UpdateBackgroundService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new BackgroundUpdatedEvent($user));

            return $this->redirect('/settings')->with('success', __('account.alerts.settings.background.update_success'));

        } catch (\Exception $e) {
            
            return $this->redirect('/settings')->with('error', __('account.alerts.settings.background.update_failed'));

        }
    }
}