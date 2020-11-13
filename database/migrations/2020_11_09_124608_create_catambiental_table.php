<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatambientalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catambiental', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->references('id')->on('project');
            $table->string('tipoAmbiental',100);
            $table->string('descripcionAmbiental',100);
            $table->date('fecharealizacionAmbiental',0);
            $table->string('responsableAmbiental',100);

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
        Schema::dropIfExists('catambiental');
    }
}
