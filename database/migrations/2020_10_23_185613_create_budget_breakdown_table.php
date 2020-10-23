<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetBreakdownTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_breakdown', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->double('amount', 10, 2);
            $table->string('currency',10);
            $table->string('uri',300);
            $table->foreignId('id_period');
            $table->text('sourceParty_name');
            $table->foreignId('sourceParty_id');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_breakdown');
    }
}
