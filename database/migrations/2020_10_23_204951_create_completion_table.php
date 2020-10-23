<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompletionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('endDate',0);
            $table->text('endDateDetails');
            $table->double('finalValue_amount',10,2);
            $table->string('finalValue_currency',10);
            $table->text('finalValueDetails');
            $table->string('finalScope',300);
            $table->text('finalScopeDetails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('completion');
    }
}
