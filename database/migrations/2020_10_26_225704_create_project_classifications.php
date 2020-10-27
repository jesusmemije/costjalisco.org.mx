<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectClassifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_classifications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreignId('id_classification');
            $table->foreign('id_classification')->references('id')->on('classification');
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
        Schema::dropIfExists('project_classifications');
    }
}
