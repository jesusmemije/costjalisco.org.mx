<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableContractprocessSummaryDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('contractprocess_summary_documents', function (Blueprint $table) {
            $table->foreign('id_summary')->references('id')->on('summary')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_document')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
