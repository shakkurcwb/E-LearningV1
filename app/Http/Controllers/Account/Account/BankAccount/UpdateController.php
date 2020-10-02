<?php

namespace App\Http\Controllers\Account\Account\BankAccount;

use Illuminate\Http\Request;

use App\Services\Account\BankAccounts\UpdateBankAccountService;

use App\Events\Account\BankAccountUpdatedEvent;

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
            'bank' => [ 'required', 'string', 'max:16' ],
            'agency' => [ 'required', 'string', 'max:16' ],
            'account' => [ 'required', 'string', 'max:16' ],
            'preferred_currency' => [ 'nullable', 'string', 'max:16' ],
        ];
    
        $messages = [
            'bank' => __('account.attributes.bank_account.bank'),
            'agency' => __('account.attributes.bank_account.agency'),
            'account' => __('account.attributes.bank_account.account'),
            'preferred_currency' => __('account.attributes.bank_account.preferred_currency'),
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

            # Update Bank Account
            $svc = new UpdateBankAccountService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new BankAccountUpdatedEvent($user));

            return $this->redirect('/preferences')->with('success', __('account.alerts.account.bank_account.update_success'));

        } catch (\Exception $e) {
            
            return $this->redirect('/preferences')->with('error', __('account.alerts.account.bank_account.update_failed'));

        }
    }
}