<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatimpactoterrenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catimpactoterreno', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->references('id')->on('project');
            $table->string('tipoImpacto',100);
            $table->string('descripcionImpacto',100);
            $table->date('fecharealizacionImpacto',0);
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
        Schema::dropIfExists('catimpactoterreno');
    }
}
