<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modifications', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date',0)->nullable();
            $table->text('description')->nullable();
            $table->string('rationale',100)->nullable();
            $table->foreignId('type')->nullable();
            $table->string('relaseID',30)->nullable();
            $table->double('oldContractValue_amount',10,2)->nullable();
            $table->string('oldContractValue_currency',10)->nullable();
            $table->double('newContractValue_amount',10,2)->nullable();
            $table->string('newContractValue_currency',10)->nullable();
            $table->foreignId('oldContracPeriod')->nullable();
            $table->foreignId('newContractPeriod')->nullable();

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
        Schema::dropIfExists('modifications');
    }
}
