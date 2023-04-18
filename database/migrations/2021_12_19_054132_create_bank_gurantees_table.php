<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBankGuranteesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_gurantees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tender_id');
            $table->date('bg_date');
            $table->string('bg_no');
            $table->string('bg_amount');
            $table->string('bank_info');
            $table->string('validity');
            $table->string('bg');
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
        Schema::dropIfExists('bank_gurantees');
    }
}
