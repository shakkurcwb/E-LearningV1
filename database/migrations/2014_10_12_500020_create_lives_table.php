<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateLivesTable extends Migration
{
    public function up()
    {
        Schema::create('lives', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->timestampTz('started_at')->nullable();
            $table->timestampTz('ended_at')->nullable();

            $table->timestampTz('tutor_logged_at')->nullable();
            $table->timestampTz('student_logged_at')->nullable();

            $table->longText('history')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lives');
    }
}
