<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableTenderSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('tender_summary', function (Blueprint $table) {
            $table->foreign('id_summary')->references('id')->on('summary')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_tender')->references('id')->on('tender')->onDelete('cascade')->onUpdate('cascade');
           

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
