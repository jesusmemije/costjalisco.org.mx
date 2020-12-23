<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsableproyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsableproyecto', function (Blueprint $table) {
            $table->id();
            $table->string('nombreresponsable',50)->nullable();
            $table->string('cargoresponsable',50)->nullable();
            $table->string('telefonoresponsable',20)->nullable();
            $table->string('correoresponsable',100)->nullable();
            $table->string('domicilioresponsable',100)->nullable();
            $table->string('horarioresponsable',50)->nullable();
            
            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onUpdate('cascade')->onDelete('cascade');
            
           
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
        Schema::dropIfExists('responsableproyecto');
    }
}
