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
            $table->string('responsable',100)->nullable();
            $table->string('email',100)->nullable();
            $table->string('organismo',100)->nullable();
            $table->string('puesto',100)->nullable();
            $table->string('involucrado',100)->nullable();


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
