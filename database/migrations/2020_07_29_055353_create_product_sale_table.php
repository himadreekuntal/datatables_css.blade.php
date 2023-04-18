<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->unsignedBigInteger('sale_id');

            $table->unsignedBigInteger('product_id');
            $table->foreign('sale_id')
                    ->references('id')
                    ->on('sales')
                    ->onDelete('cascade');
            $table->foreign('product_id')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');;
            $table->integer('quantity');
            $table->integer('c_quantity');
            $table->string('serial');
            $table->string('rate');
            $table->string('discount');
            $table->string('total');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sale');
    }
}
