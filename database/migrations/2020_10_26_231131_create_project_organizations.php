<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectOrganizations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreignId('id_organization');
            $table->foreign('id_organization')->references('id')->on('organization');
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
        Schema::dropIfExists('project_organizations');
    }
}
