<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('avatar')->nullable();
            $table->string('background')->nullable();

            $table->string('theme')->default('Blue');
            $table->string('locale')->default('pt_BR');
            $table->string('timezone')->default('America/Sao_Paulo');
            $table->string('currency')->default('BRL');

            $table->boolean('allow_newsletters')->default(false);
            $table->boolean('show_hints')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
