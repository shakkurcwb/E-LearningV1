<?php

namespace App\Http\Controllers\Account\Users;

use Illuminate\Http\Request;

use App\Events\Account\UserCreatedEvent;

use App\Services\Account\Users\StoreUserService;

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
            'role' => [ 'required', 'string', 'in:Student,Tutor' ],
            'name' => [ 'required', 'string', 'max:255' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
        ];
    
        $messages = [
            'role' => __('account.attributes.user.role'),
            'name' => __('account.attributes.user.name'),
            'email' => __('account.attributes.user.email'),
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
            $svc = new StoreUserService;
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new UserCreatedEvent($user));

            return $this->redirect('/users')->with('success', __('account.alerts.users.store_success'));

        } catch (\Exception $e) {

            return $this->redirect('/users')->with('error', __('account.alerts.users.store_error'));

        }        
    }
}