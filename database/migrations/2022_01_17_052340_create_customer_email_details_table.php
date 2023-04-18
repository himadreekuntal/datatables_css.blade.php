<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerEmailDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_email_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('email_id');
            $table->foreign('email_id')
                  ->references('id')->on('customer_emails');
            $table->string('customer_name');
            $table->string('customer_company')->unique();
            $table->string('customer_email')->unique();
            $table->string('customer_phone')->unique();
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
        Schema::dropIfExists('customer_email_details');
    }
}
