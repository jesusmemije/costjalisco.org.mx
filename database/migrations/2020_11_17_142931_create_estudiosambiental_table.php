<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosambientalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiosambiental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project');
            $table->foreignId('tipoAmbiental')->nullable();
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipoAmbiental')->references('id')->on('catambiental')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcionAmbiental',100)->nullable();
            $table->date('fecharealizacionAmbiental',0);
            $table->string('responsableAmbiental',255);
            $table->text('numeros_ambiental')->nullable();
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
        Schema::dropIfExists('estudiosambiental');
    }
}
