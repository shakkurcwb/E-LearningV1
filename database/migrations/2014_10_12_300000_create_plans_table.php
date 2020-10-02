<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    public function up()
    {
        Schema::create('plans', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->string('name');

            $table->double('price', 8, 2);

            $table->enum('interval', [
                'Single', 'Weekly', 'Monthly', 'Yearly',
            ])->default('Monthly');

            $table->boolean('is_recommended')->default(false);

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
