<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedProjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project');
            $table->string('scheme',100);
            $table->string('identifier',100);
            $table->string('relationship',20);
            $table->text('title');
            $table->string('uri',100);
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
        Schema::dropIfExists('related_projects');
    }
}
