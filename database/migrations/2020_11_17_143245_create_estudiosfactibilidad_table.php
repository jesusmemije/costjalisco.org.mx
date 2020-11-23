<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosfactibilidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiosfactibilidad', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_project');
            $table->foreignId('tipoFactibilidad');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipoFactibilidad')->references('id')->on('catfac')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcionFactibilidad',100)->nullable();
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
        Schema::dropIfExists('estudiosfactibilidad');
    }
}
