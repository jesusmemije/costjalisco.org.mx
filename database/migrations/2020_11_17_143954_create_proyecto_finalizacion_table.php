<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoFinalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_finalizacion', function (Blueprint $table) {
            $table->id();

            $table->string('descripcion',100)->nullable();
            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('costofinalizacion',20,2)->nullable();
            $table->dateTime('fechafinalizacion',0)->nullable();
            $table->string('alcancefinalizacion',100)->nullable();
            $table->string('razonescambioproyecto',100)->nullable();
            $table->string('referenciainforme',100)->nullable();
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
        Schema::dropIfExists('proyecto_finalizacion');
    }
}
