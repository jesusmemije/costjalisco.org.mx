<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('procurementMethod',20);
            $table->text('procurementMethodDetails');
            $table->double('costEstimate_amount',10,2);
            $table->string('costEstimate_currency',10);
            $table->integer('numberOfTenderers');
            $table->string('tenderers_name',100);
            $table->foreignId('tenders_id');
            $table->string('procuringEntity_name',100);
            $table->foreignId('procuringEntity_id');
            $table->string('administrativeEntity_name',100);
            $table->foreignId('administrativeEntity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tender');
    }
}
