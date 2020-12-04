<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();	
            $table->text('description')->nullable();
            $table->foreignId('id_geometry')->nullable();
            $table->foreignId('id_gazetter')->nullable();
            $table->string('uri',300)->nullable();
            $table->foreignId('id_address')->nullable();
            $table->foreign('id_address')->references('id')->on('address')->onDelete('cascade')->onUpdate('cascade');
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
