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
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->string('scheme',100)->nullable();
            $table->string('identifier',100)->nullable();
            $table->string('relationship',20)->nullable();
            $table->text('title')->nullable();
            $table->string('uri',100)->nullable();
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
