<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ocid',30);
            $table->string('externalReference',100);
            $table->foreignId('nature');
            $table->text('title');
            $table->text('description');
            $table->foreignId('status');
            $table->string('suppliers_name',100);
            $table->foreignId('suppliers_id');
            $table->double('contractValue_amount',10,2);
            $table->string('contractValue_currency',10);
            $table->foreignId('contractPeriod');
            $table->double('finalValue_amount',10,2);
            $table->string('finalValue_currency',10);



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('summary');
    }
}
