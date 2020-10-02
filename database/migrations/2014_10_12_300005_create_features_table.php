<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('features', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans');

            $table->unsignedInteger('credits');

            $table->enum('frequency', [
                'Unique', 'Once Per Week',
                'Twice Per Week', 'Thrice Per Week',
            ]);

            $table->enum('duration', [
                '01:00:00',
                '02:00:00',
                '03:00:00',
            ]);

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('features');
    }
}
