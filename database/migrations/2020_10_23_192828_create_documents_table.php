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
            $table->id();
            $table->foreignId('documentType')->nullable(true);;
           
            $table->text('description')->nullable(true);
            $table->string('url',100);
            $table->dateTime('datePublished', 0)->nullable(true);
            $table->dateTime('dateModified', 0)->nullable(true);
            $table->string('format',100)->nullable(true);
            $table->string('language',50)->nullable(true);
            $table->string('pageStart',20)->nullable(true);
            $table->string('pageEnd',20)->nullable(true);
            $table->text('accessDetails',20)->nullable(true);
            $table->string('author',300)->nullable(true);
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
        Schema::dropIfExists('documents');
    }
}
