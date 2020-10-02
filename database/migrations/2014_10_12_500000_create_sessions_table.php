<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')->references('id')->on('users');

            $table->unsignedInteger('tutor_id');
            $table->foreign('tutor_id')->references('id')->on('users');

            $table->timestampTz('start_at')->nullable();
            $table->timestampTz('end_at')->nullable();

            $table->enum('state', [
                'Pending',
                'Confirmed', 'Canceled',
                'Ongoing', 'Finished',
            ])->default('Pending');

            $table->unsignedInteger('cost')->default(1);

            $table->longText('additional_info')->nullable();
            $table->longText('explanation')->nullable();

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
