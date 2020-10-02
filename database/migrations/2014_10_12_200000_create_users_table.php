<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->enum('role', [
                'Admin', 'Student', 'Tutor',
            ]);

            $table->enum('state', [
                'Inactive', 'Active', 'On Validation', 'Banned',
            ]);

            $table->string('name');
            $table->string('email')->unique();

            $table->timestampTz('last_login_at')->nullable();
            $table->timestampTz('last_seen_at')->nullable();
            $table->timestampTz('email_verified_at')->nullable();

            $table->ipAddress('ip_address')->nullable();

            $table->unsignedInteger('credits')->default(0);
            $table->unsignedInteger('reputation')->default(0);

            $table->string('password');
            $table->rememberToken();
            $table->string('api_token')->nullable();

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
