<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advance_payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('advance_id');
            $table->foreign('advance_id')
                ->references('id')
                ->on('advance_payments')
                ->onDelete('cascade');
            $table->string('paid_amount');
            $table->string('remaining_amount');
            $table->date('payment_date');
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
        Schema::dropIfExists('advance_payment_details');
    }
}
