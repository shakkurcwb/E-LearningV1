<?php

namespace App\Http\Controllers\Account\Users;

use Illuminate\Http\Request;

use App\Services\Account\Users\UpdateUserService;
use App\Services\Account\People\UpdatePersonService;
use App\Services\Account\Addresses\UpdateAddressService;
use App\Services\Account\Phones\UpdatePhoneService;
use App\Services\Account\BankAccounts\UpdateBankAccountService;
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
     * @param Int $id
     */
    public function __invoke(Int $id = null)
    {
        // Preparing Validator
        $rules = [
            'name' => [ 'nullable', 'string', 'max:255' ],
            'password' => [ 'nullable', 'string', 'min:8', 'confirmed' ],

            'first_name' => [ 'nullable', 'string', 'max:32' ],
            'middle_names' => [ 'nullable', 'string', 'max:64' ],
            'last_name' => [ 'nullable', 'string', 'max:32' ],
            'document' => [ 'nullable', 'string', 'min:11', 'max:14' ],
            'birth' => [ 'nullable', 'date' ],
            'gender' => [ 'nullable', 'in:Male,Female' ],
            'nationality' => [ 'nullable', 'string' ],

            'address' => [ 'nullable', 'string', 'max:64' ],
            'number' => [ 'nullable', 'string', 'max:16' ],
            'unit' => [ 'nullable', 'string', 'max:16' ],
            'complement' => [ 'nullable', 'string', 'max:64' ],
            'district' => [ 'nullable', 'string', 'max:32' ],
            'city' => [ 'nullable', 'string', 'max:32' ],
            'zip_code' => [ 'nullable', 'string', 'max:16' ],
            'province' => [ 'nullable', 'string', 'max:16' ],
            'country' => [ 'nullable', 'string', 'max:16' ],

            'country_prefix' => [ 'nullable', 'string', 'max:8' ],
            'prefix' => [ 'nullable', 'string', 'max:8' ],
            'phone' => [ 'nullable', 'string', 'max:12' ],
            'allow_messages' => [ 'nullable', 'boolean' ],

            'bank' => [ 'nullable', 'string', 'max:16' ],
            'agency' => [ 'nullable', 'string', 'max:16' ],
            'account' => [ 'nullable', 'string', 'max:16' ],
            'currency' => [ 'nullable', 'string', 'max:16' ],

            'theme' => [ 'nullable', 'string', 'max:32' ],
            'locale' => [ 'nullable', 'string', 'max:64' ],
            'timezone' => [ 'nullable', 'string', 'max:32' ],
            'currency' => [ 'nullable', 'string', 'max:16' ],
            'allow_newsletters' => [ 'nullable', 'boolean' ],
            'show_hints' => [ 'nullable', 'boolean' ],
        ];
    
        $messages = [
            'role' => __('account.attributes.user.role'),
            'name' => __('account.attributes.user.name'),
            'email' => __('account.attributes.user.email'),
            'password' => __('account.attributes.user.password'),

            'first_name' => __('account.attributes.person.first_name'),
            'middle_names' => __('account.attributes.person.middle_names'),
            'last_name' => __('account.attributes.person.last_name'),
            'document' => __('account.attributes.person.document'),
            'birth' => __('account.attributes.person.birth'),
            'gender' => __('account.attributes.person.gender'),
            'nationality' => __('account.attributes.person.nationality'),

            'address' => __('account.attributes.address.address'),
            'number' => __('account.attributes.address.number'),
            'unit' => __('account.attributes.address.unit'),
            'complement' => __('account.attributes.address.complement'),
            'district' => __('account.attributes.address.district'),
            'city' => __('account.attributes.address.city'),
            'zip_code' => __('account.attributes.address.zip_code'),
            'province' => __('account.attributes.address.province'),
            'country' => __('account.attributes.address.country'),

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
                'user_id' => $id,
            ];

            # Update User
            $svc = new UpdateUserService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $user = $svc->execute();

            # Update Person
            $svc = new UpdatePersonService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            # Update Address
            $svc = new UpdateAddressService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            # Update Phone
            $svc = new UpdatePhoneService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            # Update Bank Account
            $svc = new UpdateBankAccountService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            # Update Settings
            $svc = new UpdateSettingsService;
            $svc->setParameters($parameters);
            $svc->setAttributes($attributes);
            $svc->execute();

            return $this->redirect('/users/' . $id)->with('success', __('account.alerts.users.update_success'));

        } catch (\Exception $e) {

            return $this->redirect('/users/' . $id)->with('error', __('account.alerts.users.update_failed'));

        }
    }
}