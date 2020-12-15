<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoContratacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_contratacion', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('descripcion',100)->nullable();
            $table->date('fechapublicacion',0)->nullable();
            $table->string('entidadadjudicacion',255)->nullable();
            $table->string('datosdecontacto',50)->nullable();
            $table->string('nombreresponsable',50)->nullable();
            $table->foreignId('modalidadadjudicacion')->nullable();
            $table->foreignId('tipocontrato')->nullable();
            $table->foreignId('modalidadcontrato')->nullable();
            $table->foreignId('estadoactual')->nullable();

            $table->foreign('modalidadadjudicacion')->references('id')->on('catmodalidad_adjudicacion')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('tipocontrato')->references('id')->on('cattipo_contrato')->onDelete('set null')->onUpdate('cascade');
      
            $table->foreign('estadoactual')->references('id')->on('contractingprocess_status')->onDelete('set null')->onUpdate('cascade');
            

            $table->text('empresasparticipantes')->nullable();
            $table->string('entidad_admin_contrato',250)->nullable();
            $table->string('titulocontrato',250)->nullable();
            $table->text('empresacontratada')->nullable();
            $table->string('viapropuesta',50)->nullable();
            $table->date('fechapresentacionpropuesta',0)->nullable();
            $table->decimal('montocontrato',20,2)->nullable();
            $table->string('alcancecontrato',200)->nullable();
            $table->date('fechainiciocontrato',0)->nullable();
            $table->string('duracionproyecto_contrato',50)->nullable();


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
        Schema::dropIfExists('proyecto_contratacion');
    }
}
