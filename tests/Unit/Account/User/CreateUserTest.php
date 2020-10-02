<?php

namespace Tests;

use App\Models\Account\Common\Role;
use App\Models\Account\Common\Status;

use App\Services\Invoker;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    // Should return null when invalid attributes.
    public function testInvalidAttributes()
    {
        $svc = Invoker::make("Account", "User", "CreateUser");

        $attributes = [
            // 
        ];

        $svc->setAttributes($attributes);
        $user = $svc->execute();

        $this->assertNull($user);
    }

    // Should return UserModel when valid attributes.
    public function testValidAttributes()
    {
        $svc = Invoker::make("Account", "User", "CreateUser");

        $attributes = [
            'role' => Role::ADMIN,
            'status' => Status::ACTIVE,
            'email' => 'dev@example.com',
            'name' => 'Developer',
            'password' => 'developer',
        ];

        $svc->setAttributes($attributes);
        $user = $svc->execute();

        $this->assertIsObject($user);
        $this->assertDatabaseHas('users', [
            'email' => 'dev@example.com',
        ]);
    }
}
