<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('rfid')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nationality');
            $table->string('voter_id');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('religion');
            $table->string('gender');
            $table->date('dob');
            $table->longText('present_address');
            $table->longText('permanent_address');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('mother_name');
            $table->string('mother_phone');

            $table->string('image')->default('default.png');
            $table->string('documents')->default('default.pdf');
            $table->integer('status');
            $table->unsignedBigInteger('designation_id');
            $table->foreign('designation_id')
                  ->references('id')->on('designations')
                  ->onDelete('cascade');
            $table->date('joining_date');

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
        Schema::dropIfExists('employees');
    }
}
