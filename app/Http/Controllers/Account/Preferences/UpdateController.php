<?php

namespace App\Http\Controllers\Account\Preferences;

use Illuminate\Http\Request;

use App\Services\Account\Preferences\UpdatePreferencesService;

use App\Events\Account\PreferencesUpdatedEvent;

use App\Http\Controllers\ActionController;

class UpdateController extends ActionController
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('tutor');

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
            'biography' => [ 'required', 'string', 'max:2048' ],
            'video' => [ 'nullable', 'url' ],

            'allow_trial_sessions' => [ 'nullable', 'boolean' ],
            'allow_public_view' => [ 'nullable', 'boolean' ],
        ];
    
        $messages = [
            'biography' => __('account.attributes.preferences.biography'),
            'video' => __('account.attributes.preferences.video'),

            'allow_trial_sessions' => __('account.attributes.preferences.allow_trial_sessions'),
            'allow_public_view' => __('account.attributes.preferences.allow_public_view'),
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

            # Update Preferences
            $svc = new UpdatePreferencesService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new PreferencesUpdatedEvent($user));

            return $this->redirect('/preferences')->with('success', __('account.alerts.preferences.update_success'));

        } catch (\Exception $e) {

            return $this->redirect('/preferences')->with('error', __('account.alerts.preferences.update_failed'));

        }        
    }
}