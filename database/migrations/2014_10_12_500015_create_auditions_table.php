<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateAuditionsTable extends Migration
{
    public function up()
    {
        Schema::create('auditions', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auditions');
    }
}
