<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->string('slug')->unique();

            $table->double('discount', 8, 2);

            $table->timestampTz('expires_at')->nullable();

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
