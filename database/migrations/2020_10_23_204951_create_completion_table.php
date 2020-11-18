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
            $table->id();
            $table->dateTime('endDate',0)->nullable();
            $table->text('endDateDetails')->nullable();
            $table->double('finalValue_amount',10,2)->nullable();
            $table->string('finalValue_currency',10)->nullable();
            $table->text('finalValueDetails')->nullable();
            $table->string('finalScope',300)->nullable();
            $table->text('finalScopeDetails')->nullable();
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
        Schema::dropIfExists('completion');
    }
}
