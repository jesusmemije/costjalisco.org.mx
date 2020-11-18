<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiosimpactoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiosimpacto', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_project');
            $table->foreignId('tipoImpacto');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tipoImpacto')->references('id')->on('catimpactoterreno')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcionImpacto',100);
            $table->date('fecharealizacionimpacto',0);
            $table->string('responsableImpacto',100);

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
        Schema::dropIfExists('estudiosimpacto');
    }
}
