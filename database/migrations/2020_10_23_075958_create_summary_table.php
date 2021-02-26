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
            $table->id();
            $table->string('ocid',30)->nullable();
            $table->string('externalReference',100)->nullable();
            $table->foreignId('nature')->nullable();
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('status')->nullable();
            $table->string('suppliers_name',100)->nullable();
            $table->foreignId('suppliers_id')->nullable();
            $table->double('contractValue_amount',10,2)->nullable();
            $table->string('contractValue_currency',10)->nullable();
            $table->foreignId('contractPeriod')->nullable();
            $table->double('finalValue_amount',10,2)->nullable();
            $table->string('finalValue_currency',10)->nullable();
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
        Schema::dropIfExists('summary');
    }
}
