<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractingProcessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracting_process', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('_id',30);
            $table->foreignId('id_project');
            $table->foreignId('id_summary');
            $table->foreignId('id_relases');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracting_process');
    }
}
