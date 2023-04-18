<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceGuranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_gurantees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tender_id');
            $table->date('pg_date');
            $table->string('pg_no');
            $table->string('pg_amount');
            $table->string('bank_info');
            $table->string('validity');
            $table->string('noa');
            $table->string('pg');
            $table->foreign('tender_id')
                ->references('id')->on('tenders');
            $table->string('status');
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
        Schema::dropIfExists('performance_gurantees');
    }
}
