<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_id');
            $table->date('sales_date');
            $table->unsignedBigInteger('customer_id');
            $table->string('sub_total');
            $table->string('vat');
            $table->string('vat_amount');
            $table->string('total_amount');
            $table->string('paid');
            $table->string('due');
            $table->string('payment_type');
            $table->string('payment_status');
            $table->boolean('order_status')->default(false);
            $table->string('bill_id');
            $table->foreign('customer_id')
                  ->references('id')->on('customers')
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
        Schema::dropIfExists('sales');
    }
}
