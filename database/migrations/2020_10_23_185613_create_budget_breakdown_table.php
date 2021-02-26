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
            $table->id();
            $table->text('description')->nullable();
            $table->double('amount', 10, 2)->nullable();
            $table->string('currency',10)->nullable();
            $table->string('uri',300)->nullable();
            $table->foreignId('id_period')->nullable();
            $table->text('sourceParty_name')->nullable();
            $table->foreignId('sourceParty_id')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

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
