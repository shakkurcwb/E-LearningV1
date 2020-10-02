<?php

namespace App\Http\Controllers\Account\Settings\Basic;

use Illuminate\Http\Request;

use App\Services\Account\Users\UpdateUserService;

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
            'name' => [ 'required', 'string', 'max:16' ],
            'password' => [ 'nullable', 'string', 'min:8', 'confirmed' ],
        ];
    
        $messages = [
            'name' => __('account.attributes.user.name'),
            'password' => __('account.attributes.user.password'),
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

            # Update User
            $svc = new UpdateUserService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            return $this->redirect('/settings')->with('success', __('account.alerts.settings.basic.update_success'));

        } catch (\Exception $e) {

            return $this->redirect('/settings')->with('error', __('account.alerts.settings.basic.update_failed'));

        }        
    }
}