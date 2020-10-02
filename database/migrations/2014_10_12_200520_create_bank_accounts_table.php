<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateBankAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('account')->nullable();

            $table->string('preferred_currency')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
