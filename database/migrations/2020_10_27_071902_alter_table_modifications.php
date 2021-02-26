<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableModifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('modifications', function (Blueprint $table) {
        
            $table->foreign('type')->references('id')->on('modification_type')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('oldContracPeriod')->references('id')->on('period')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('newContractPeriod')->references('id')->on('period')->onDelete('set null')->onUpdate('cascade');
            
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
