<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->date('qut_date');
            $table->unsignedBigInteger('customer_id');
            $table->string('sub_total');
            $table->string('vat');
            $table->string('vat_amount');            
            $table->string('ait');
            $table->string('ait_amount'); 
            $table->string('total_amount');
            $table->string('delivery_time');
            $table->string('payment');
            $table->boolean('qut_status')->default(false);
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
        Schema::dropIfExists('quotations');
    }
}
