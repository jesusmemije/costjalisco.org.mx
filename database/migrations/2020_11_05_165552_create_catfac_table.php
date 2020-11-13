<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatfacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catfac', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->references('id')->on('project');
            $table->string('tipoFactibilidad',100);
            $table->string('descripcionFactibilidad',100);
            $table->date('fecharealizacionFactibilidad',0);
            $table->string('responsableFactibilidad',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catfac');
    }
}
