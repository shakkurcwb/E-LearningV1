<?php

use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

# Account

$factory->define(App\Models\Account\UserModel::class, function (Faker $faker) {
    return [
        'role' => 'Tutor',
        'state' => 'Active',
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'last_login_at' => now(),
        'last_seen_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'reputation' => $faker->numberBetween(10, 150),
    ];
});

$factory->define(App\Models\Account\PersonModel::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'document' => '01234567890',
        'birth' => $faker->dateTimeThisCentury,
        'nationality' => $faker->country,
    ];
});

$factory->define(App\Models\Account\AddressModel::class, function (Faker $faker) {
    return [
        'address' => $faker->streetName,
        'number' => $faker->buildingNumber,
        'zip_code' => $faker->postcode,
        'country' => $faker->country,
    ];
});

$factory->define(App\Models\Account\PhoneModel::class, function (Faker $faker) {
    return [
        'prefix' => $faker->numberBetween(100, 500),
        'phone' => $faker->phoneNumber,
    ];
});

$factory->define(App\Models\Account\PreferencesModel::class, function (Faker $faker) {
    return [
        'availabilities' => [],
        'biography' => $faker->text(1024),
        'video' => "https://www.youtube.com/watch?v=tOwjEOt1zYU",
        'allow_trial_sessions' => $faker->boolean,
    ];
});

$factory->define(App\Models\Account\BankAccountModel::class, function (Faker $faker) {
    return [
        'bank' => $faker->numberBetween(100, 500),
        'agency' => $faker->numberBetween(100, 500),
        'account' => $faker->numberBetween(100, 500),
    ];
});

$factory->define(App\Models\Account\SettingsModel::class, function (Faker $faker) {
    return [
        'theme' => 'Red',
    ];
});

$factory->afterCreating(App\Models\Account\UserModel::class, function ($user, $faker) {
    $user->person()->save(
        factory(App\Models\Account\PersonModel::class)->make()
    );
    $user->address()->save(
        factory(App\Models\Account\AddressModel::class)->make()
    );
    $user->phone()->save(
        factory(App\Models\Account\PhoneModel::class)->make()
    );
    $user->preferences()->save(
        factory(App\Models\Account\PreferencesModel::class)->make()
    );
    $user->bank_account()->save(
        factory(App\Models\Account\BankAccountModel::class)->make()
    );
    $user->settings()->save(
        factory(App\Models\Account\SettingsModel::class)->make()
    );
    $user->admissions()->save(
        factory(App\Models\Education\AdmissionModel::class)->make([
            'user_id' => $user->id,
        ])
    );
});

# Education

$factory->define(App\Models\Education\AdmissionModel::class, function (Faker $faker) {
    return [
        'form_id' => 2,
        'is_approved' => true,
        'verified_at' => now(),
    ];
});

$factory->define(App\Models\Education\AnswerModel::class, function (Faker $faker) {
    return [
        // 
    ];
});

$factory->afterMaking(App\Models\Education\AdmissionModel::class, function ($admission, $faker) {
    foreach($admission->form->questions as $question)
    {
        $type = $question->type;
        $options = $question->options;

        if (!empty($options) && $type === 'Select')
        {
            $answer = Arr::random($options)['key'];
        }
        if (!empty($options) && $type === 'Check')
        {
            $answer = [
                Arr::random($options)['key'],
                Arr::random($options)['key'],
                Arr::random($options)['key'],
                Arr::random($options)['key'],
                Arr::random($options)['key'],
            ];
        }
        if (empty($options))
        {
            $answer = $faker->sentences;
        }

        $admission->user->answers()->save(
            factory(App\Models\Education\AnswerModel::class)->make([
                'user_id' => $admission->user->id,
                'question_id' => $question->id,
                'form_id' => $admission->form->id,
                'answer' => $answer,
            ])
        );
    }
});