<?php

namespace Tests;

use App\Models\Account\Common\Role;
use App\Models\Account\Common\Status;

use App\Services\Invoker;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class EditUserTest extends TestCase
{
    use RefreshDatabase;

    // Should return null when invalid attributes.
    public function testInvalidAttributes()
    {
        $svc = Invoker::make("Account", "User", "EditUser");

        $parameters = [
            'user_id' => 12,
        ];

        $attributes = [
            // 
        ];

        $svc->setParameters($parameters);
        $svc->setAttributes($attributes);
        $user = $svc->execute();

        $this->assertNull($user);
    }

    // Should return UserModel when valid attributes.
    public function testValidAttributes()
    {
        $svc = Invoker::make("Account", "User", "EditUser");

        $parameters = [
            'user_id' => 12,
        ];

        $attributes = [
            'name' => 'Developer 2',
        ];

        $svc->setParameters($parameters);
        $svc->setAttributes($attributes);
        $user = $svc->execute();

        $this->assertIsObject($user);
        $this->assertDatabaseHas('users', [
            'email' => 'dev@example.com',
        ]);
    }
}
