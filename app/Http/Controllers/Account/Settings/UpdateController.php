<?php

namespace App\Http\Controllers\Account\Settings;

use Illuminate\Http\Request;

use App\Services\Account\Settings\UpdateSettingsService;

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
            'theme' => [ 'required', 'string', 'max:32' ],
            'locale' => [ 'required', 'string', 'max:64' ],
            'timezone' => [ 'required', 'string', 'max:32' ],
            'currency' => [ 'required', 'string', 'max:16' ],
            'allow_newsletters' => [ 'nullable', 'boolean' ],
            'show_hints' => [ 'nullable', 'boolean' ],
        ];

        $messages = [
            'theme' => __('account.attributes.settings.theme'),
            'locale' => __('account.attributes.settings.locale'),
            'timezone' => __('account.attributes.settings.timezone'),
            'currency' => __('account.attributes.settings.currency'),
            'allow_newsletters' => __('account.attributes.settings.allow_newsletters'),
            'show_hints' => __('account.attributes.settings.show_hints'),
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

            # Update Settings
            $svc = new UpdateSettingsService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            return $this->redirect('/settings')->with('success', __('account.alerts.settings.update_success'));

        } catch (\Exception $e) {

            return $this->redirect('/settings')->with('error', __('account.alerts.settings.update_failed'));

        }
    }
}