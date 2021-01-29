<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneraldataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generaldata', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('responsable')->nullable();
            $table->text('email')->nullable();
            $table->text('organismo')->nullable();
            $table->text('puesto')->nullable();
            $table->text('involucrado')->nullable();
            $table->string('video',250)->nullable();
            $table->text('observaciones')->nullable();


            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');

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
     
        Schema::dropIfExists('generaldata');
          
        
    }
}
