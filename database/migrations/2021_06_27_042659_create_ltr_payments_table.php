<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLtrPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ltr_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lc_id');
            $table->string('payment_date');
            $table->string('payment_amount');
            $table->string('payment_remaining');
            $table->string('bank_statement_ap')->default('default.pdf'); 
            $table->foreign('lc_id')
                    ->references('id')->on('lc_details')
                    ->onDelete('cascade');     
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
        Schema::dropIfExists('ltr_payments');
    }
}
