<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('form_id');
            $table->foreign('form_id')->references('id')->on('forms');

            $table->string('title');

            $table->enum('type', [
                'Short', 'Link', 'Text', 'Select', 'Check',
            ])->default('Short');

            $table->longText('options')->nullable();

            $table->text('correct_answers')->nullable();

            $table->boolean('is_required')->default(true);

            $table->boolean('is_matchable')->default(false);
            $table->boolean('show_matches')->default(false);

            $table->unsignedInteger('order')->default(1);

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
