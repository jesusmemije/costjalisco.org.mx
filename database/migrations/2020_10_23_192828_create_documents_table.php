<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('documents');
            $table->foreignId('documentType');
            $table->text('description');
            $table->string('url',100);
            $table->dateTime('datePublished', 0);
            $table->dateTime('dateModified', 0);
            $table->string('format',100);
            $table->string('language',50);
            $table->string('pageStart',20);
            $table->string('pageEnd',20);
            $table->text('accessDetails',20);
            $table->string('author',300);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
