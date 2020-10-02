<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->longText('availabilities')->nullable();

            $table->longText('biography')->nullable();

            $table->string('video')->nullable();

            $table->boolean('allow_trial_sessions')->default(false);
            $table->boolean('allow_public_view')->default(true);
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
