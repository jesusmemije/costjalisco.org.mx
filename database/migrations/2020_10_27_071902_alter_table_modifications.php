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
        
            $table->foreign('type')->references('id')->on('modification_type');
            $table->foreign('oldContracPeriod')->references('id')->on('period');
            $table->foreign('newContractPeriod')->references('id')->on('period');
            
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
