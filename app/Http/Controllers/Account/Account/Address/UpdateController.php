<?php

namespace App\Http\Controllers\Account\Account\Address;

use Illuminate\Http\Request;

use App\Services\Account\Addresses\UpdateAddressService;

use App\Events\Account\AddressUpdatedEvent;

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
            'address' => [ 'required', 'string', 'max:64' ],
            'number' => [ 'required', 'string', 'max:16' ],
            'unit' => [ 'nullable', 'string', 'max:16' ],
            'complement' => [ 'nullable', 'string', 'max:64' ],
            'district' => [ 'nullable', 'string', 'max:32' ],
            'city' => [ 'nullable', 'string', 'max:32' ],
            'zip_code' => [ 'required', 'string', 'max:16' ],
            'province' => [ 'nullable', 'string', 'max:16' ],
            'country' => [ 'required', 'string', 'max:16' ],
        ];
    
        $messages = [
            'address' => __('account.attributes.address.address'),
            'number' => __('account.attributes.address.number'),
            'unit' => __('account.attributes.address.unit'),
            'complement' => __('account.attributes.address.complement'),
            'district' => __('account.attributes.address.district'),
            'city' => __('account.attributes.address.city'),
            'zip_code' => __('account.attributes.address.zip_code'),
            'province' => __('account.attributes.address.province'),
            'country' => __('account.attributes.address.country'),
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

            # Update Address
            $svc = new UpdateAddressService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            // Trigger Event
            event(new AddressUpdatedEvent($user));

            return $this->redirect('/account')->with('success', __('account.alerts.account.address.update_success'));

        } catch (\Exception $e) {
            
            return $this->redirect('/account')->with('error', __('account.alerts.account.address.update_failed'));

        }
    }
}