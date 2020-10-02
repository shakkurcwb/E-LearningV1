<?php

use App\Services\Account\Users\StoreUserService;

use App\Libraries\Account\Users\Role;
use App\Libraries\Account\Users\State;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the admin seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new StoreUserService();
        $admin->setAttributes([
            'role' => Role::ADMIN,
            'state' => State::ACTIVE,
            'name' => 'admin',
            'email' => 'admin@app.com',
            'password' => 'admin',
        ]);
        $user = $admin->execute();

        $user->email_verified_at = now();
        $user->last_seen_at = now();

        $user->save();

        $student = new StoreUserService();
        $student->setAttributes([
            'role' => Role::STUDENT,
            'state' => State::INACTIVE,
            'name' => 'student',
            'email' => 'student@app.com',
            'password' => 'student',
        ]);
    }
}