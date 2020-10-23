<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractingprocessStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractingprocess_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 20);
            $table->string('titulo', 20);
            $table->string('descripcion', 300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contractingprocess_status');
    }
}
