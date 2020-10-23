<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractprocessSummaryModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractprocess_summary_modifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('id_summary');
            $table->foreignId('id_modifications');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contractprocess_summary_modifications');
    }
}
