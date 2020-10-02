<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration
{
    public function up()
    {
        Schema::create('phones', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('country_prefix')->nullable();
            $table->string('prefix')->nullable();
            $table->string('phone')->nullable();

            $table->boolean('allow_messages')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
