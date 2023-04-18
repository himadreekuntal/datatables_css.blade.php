<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLcDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lc_details', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->unsignedBigInteger('brand_id');
            $table->string('commodities');
            $table->string('payment_type');
            $table->string('amount');
            $table->string('currency_type');
            $table->string('conv_rate');
            $table->string('total_amount_bdt');
            $table->string('margin');
            $table->string('ltr_amount');          
            $table->string('invoice')->default('default.pdf');
            $table->string('lc_document')->default('default.pdf');
            $table->string('boe')->default('default.pdf');
            $table->string('bank_statement')->default('default.pdf');  
            $table->foreign('brand_id')
                    ->references('id')->on('brands')
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
        Schema::dropIfExists('lc_details');
    }
}
