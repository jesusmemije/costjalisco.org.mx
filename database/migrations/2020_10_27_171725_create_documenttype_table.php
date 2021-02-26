<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumenttypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documenttype', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',50)->nullable(true);
            $table->string('titulo',100);
            $table->text('descripcion')->nullable(true);
            $table->string('fuente',50)->nullable(true);
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
        Schema::dropIfExists('documenttype');
    }
}
