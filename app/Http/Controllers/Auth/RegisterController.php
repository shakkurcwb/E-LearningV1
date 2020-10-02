<?php

namespace App\Http\Controllers\Auth;

use App\Events\Account\UserCreatedEvent;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;

use App\Libraries\Account\Users\State;

use App\Models\Account\UserModel;

use App\Services\Account\Users\StoreUserService;

use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('locale');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param Array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Array $payload)
    {
        $rules = [
            'role' => [ 'required', 'string', 'in:Student,Tutor' ],
            'name' => [ 'required', 'string', 'max:16' ],
            'email' => [ 'required', 'string', 'email', 'max:255', 'unique:users' ],
            'password' => [ 'required', 'string', 'min:8', 'confirmed' ],
            'allow_newsletters' => [ 'nullable', 'boolean' ],
            'locale' => [ 'nullable', 'string' ],
            'timezone' => [ 'nullable', 'string' ],
        ];

        $attributes = [
            'role' => __('auth.attributes.role'),
            'name' => __('auth.attributes.name'),
            'email' => __('auth.attributes.email'),
            'password' => __('auth.attributes.password'),
            'allow_newsletters' => __('auth.attributes.allow_newsletters'),
            'locale' => __('auth.attributes.locale'),
            'timezone' => __('auth.attributes.timezone'),
        ];

        return Validator::make($payload, $rules, [], $attributes);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param Array $payload
     * @return \App\Models\Account\UserModel
     */
    protected function create(Array $payload): UserModel
    {
        $svc = new StoreUserService;
        $svc->setAttributes([
            'role' => $payload['role'],
            'state' => State::INACTIVE,
            'name' => $payload['name'],
            'email' => $payload['email'],
            'password' => $payload['password'],
            'settings' => [
                'allow_newsletters' => $payload['allow_newsletters'] ?? false,
                'locale' => $payload['locale'] ?? config('app.locale'),
                'timezone' => $payload['timezone'] ?? config('app.timezone'),
            ],
        ]);
        $user = $svc->execute();

        // Trigger Event
        event(new UserCreatedEvent($user));

        return $user;
    }
}
