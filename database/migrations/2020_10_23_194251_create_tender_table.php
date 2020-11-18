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
            $table->id();
            $table->string('procurementMethod',20)->nullable();
            $table->text('procurementMethodDetails')->nullable();
            $table->double('costEstimate_amount',10,2)->nullable();
            $table->string('costEstimate_currency',10)->nullable();
            $table->integer('numberOfTenderers')->nullable();
            $table->string('tenderers_name',100)->nullable();
            $table->foreignId('tenders_id')->nullable();
            $table->string('procuringEntity_name',100)->nullable();
            $table->foreignId('procuringEntity_id')->nullable();
            $table->string('administrativeEntity_name',100)->nullable();
            $table->foreignId('administrativeEntity_id')->nullable();
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
        Schema::dropIfExists('tender');
    }
}
