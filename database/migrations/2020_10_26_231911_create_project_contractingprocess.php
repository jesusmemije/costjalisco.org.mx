<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectContractingprocess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_contractingprocess', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project');
            $table->foreignId('id_contractingprocess');
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreign('id_contractingprocess')->references('id')->on('contracting_process');
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
        Schema::dropIfExists('project_contractingprocess');
    }
}
