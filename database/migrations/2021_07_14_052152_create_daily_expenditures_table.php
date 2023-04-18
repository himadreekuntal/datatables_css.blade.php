<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_expenditures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expenditure_id');
            $table->string('amount'); 
            $table->date('date');
            $table->string('reference');
            $table->foreign('expenditure_id')
                  ->references('id')->on('expenditure_lists');    
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
        Schema::dropIfExists('daily_expenditures');
    }
}
