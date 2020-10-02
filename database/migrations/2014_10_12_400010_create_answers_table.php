<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    public function up()
    {
        Schema::create('answers', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions');

            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');

            $table->unsignedInteger('session_id')->nullable();
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->text('answer')->nullable();

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
