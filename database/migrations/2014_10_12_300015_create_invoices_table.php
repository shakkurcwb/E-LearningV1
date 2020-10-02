<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->unsignedInteger('subscription_id');
            $table->foreign('subscription_id')->references('id')->on('subscriptions');

            $table->enum('state', [
                'Draft', 'Pending',
                'Partially Paid', 'Paid',
                'Canceled', 'Refunded',
                'Expired', 'In Protest',
                'Chargeback', 'In Analysis',
            ])->default('Draft');

            $table->string('method')->nullable();
            $table->string('cc_token')->nullable()->index();

            $table->longText('request')->nullable();
            $table->longText('response')->nullable();

            $table->text('errors')->nullable();

            $table->timestampsTz();
            $table->softDeletesTz();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
