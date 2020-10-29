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
            $table->dateTime('date',0);
            $table->text('description');
            $table->string('rationale',100);
            $table->foreignId('type');
            $table->string('relaseID',30);
            $table->double('oldContractValue_amount',10,2);
            $table->string('oldContractValue_currency',10);
            $table->double('newContractValue_amount',10,2);
            $table->string('newContractValue_currency',10);
            $table->foreignId('oldContracPeriod');
            $table->foreignId('newContractPeriod');

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
