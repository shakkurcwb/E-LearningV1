<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('address')->nullable();
            $table->string('number')->nullable();
            $table->string('unit')->nullable();

            $table->string('complement')->nullable();
            $table->string('district')->nullable();

            $table->string('city')->nullable();
            $table->string('zip_code')->nullable();

            $table->string('province')->nullable();
            $table->string('country')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
