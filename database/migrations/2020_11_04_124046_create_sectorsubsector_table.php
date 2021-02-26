<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectorsubsectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectorsubsector', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sector');
            $table->foreignId('id_subsector');
            $table->foreign('id_sector')->references('id')->on('projectsector')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_subsector')->references('id')->on('subsector')->onDelete('cascade')->onUpdate('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectorsubsector');
    }
}
