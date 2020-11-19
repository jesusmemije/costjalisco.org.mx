<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoEjecucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_ejecucion', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');

            $table->string('descripcion',100)->nullable();
            $table->string('variacionespreciocontrato',100)->nullable();
            $table->string('razonescambiopreciocontrato',100)->nullable();
            $table->string('variacionesduracioncontrato',100)->nullable();
            $table->string('razonescambioduracioncontrato',100)->nullable();
            $table->string('variacionesalcancecontrato',100)->nullable();
            $table->string('razonescambiosalcancecontrato',100)->nullable();
            $table->string('aplicacionescalatoria',100)->nullable();
            $table->string('estadoactualproyecto',100)->nullable();
            
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
        Schema::dropIfExists('proyecto_ejecucion');
    }
}
