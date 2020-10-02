<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    public function up()
    {
        Schema::create('forms', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('title');

            $table->enum('type', [
                'Admission', 'Audition',
                'Exercise', 'Exam',
            ]);

            $table->text('description')->nullable();
            $table->text('tags')->nullable();

            $table->enum('state', [
                'Draft', 'Published',
            ])->default('Draft');

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
