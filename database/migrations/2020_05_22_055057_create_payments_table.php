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
            $table->bigIncrements('id');
            $table->boolean('payment_status');
            $table->float('payment_amount');
            $table->bigInteger('participant_id')->unsigned()->index();
            $table->timestamps();
            $table->integer('pay_by');
            $table->string('paymentImg')->nullable();
            $table->foreign('participant_id')->references('id')->on('participants');
            $table->softDeletes();
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
