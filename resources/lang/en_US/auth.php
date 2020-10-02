<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These Credentials Do Not Match Our Records.',
    'throttle' => 'Too Many Login Attempts. Please Try Again In :seconds Seconds.',

    /*
    |--------------------------------------------------------------------------
    | Custom Auth Implementation
    |--------------------------------------------------------------------------
    */

    'attributes' => [
        'roles' => [
            'tutor' => 'Tutor',
            'student' => 'Student',
        ],
        'role' => 'Role',
        'name' => 'Username',
        'email' => 'Email',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'remember_me' => 'Remember Me',
        'allow_newsletters' => 'I Agree To Receive Newsletters',
        'locale' => 'Locale',
        'timezone' => 'Timezone',
    ],

    'login' => [
        'title' => 'Fala Education',
        'description' => 'Already Registered? Sign In!',
        'submit' => 'Sign In',
        'forgot_password_link' => 'Forgot Password?',
        'register_link' => 'Dont Have An Account Yet?',
    ],

    'register' => [
        'title' => 'Create Your Account',
        'description' => 'Get Access To Our Community Today!',
        'submit' => 'Sign Up',
        'login_link' => 'Already Have An Account?',
    ],

    'verify' => [
        'title' => 'Verify Your Email Address',
        'description' => 'Before Proceeding, Please Check Your Email For A Verification Link.',
        'alert' => 'A Fresh Verification Link Has Been Sent To Your Email Address.',
        'verification_link' => "Didn't Receive The Email? Click Here To Resend.",
    ],

    'passwords' => [

        'email' => [
            'title' => 'Password Reminder',
            'description' => "Please Provide Your Account's Email And We Will Send You Your Password.",
            'submit' => 'Send Password Reset Link',
            'login_link' => 'Remembered Your Account? Sign In!',
        ],

        'reset' => [
            'title' => 'Reset Password',
            'description' =>'Enter A New Password For Your Account.',
            'submit' => 'Update Password',
        ],

    ],

];
