<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateDepositsTable extends Migration
{
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('session_id');
            $table->foreign('session_id')->references('id')->on('sessions');

            $table->enum('state', [
                'Drafted', 'Requested', 'Approved', 'Rejected',
            ])->default('Drafted');

            $table->double('amount', 8, 2);

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
