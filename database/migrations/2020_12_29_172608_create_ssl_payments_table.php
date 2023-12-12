<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSslPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssl_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('amount')->nullable();
            $table->string('bank_tran_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_issuer')->nullable();
            $table->string('card_issuer_country_code')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_type')->nullable();
            $table->string('status')->nullable();
            $table->string('store_amount')->nullable();
            $table->string('tran_date')->nullable();
            $table->string('tran_id')->nullable();
            $table->string('val_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssl_payments');
    }
}
