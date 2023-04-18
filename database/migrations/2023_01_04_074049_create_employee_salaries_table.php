<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');
            $table->string('home_allowance');
            $table->string('car_allowance');
            $table->string('medical_allowance');
            $table->string('education_allowance');
            $table->string('base_salary');
            $table->string('pf');
            $table->string('tax');
            $table->string('advance_payment')->nullable();
            $table->string('total_salary');
            $table->softdeletes();
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
        Schema::dropIfExists('employee_salaries');
    }
}
