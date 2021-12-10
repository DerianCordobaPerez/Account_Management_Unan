<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('concept');
            $table->string('amount');
            $table->dateTime('date_made_payment');
            $table->string('payment_registration_date');
            $table->string('amount_in_letters');
            $table->string('observation');
            $table->string('payment_received');
            $table->string('account_is_payment');
            $table->string('identification');
            $table->string('exchange_rate');
            $table->string('currency');
            $table->string('receipt_number');
            $table->string('pay_time');
            $table->string('cashier');
            $table->string('cashier_identification');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
        Schema::dropIfExists('payments');
    }
}
