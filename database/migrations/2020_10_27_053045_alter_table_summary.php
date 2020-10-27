<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSummary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('summary', function (Blueprint $table) {
            
            $table->foreign('nature')->references('id')->on('contractnature');
            $table->foreign('status')->references('id')->on('contractingprocess_status');
            $table->foreign('suppliers_id')->references('id')->on('organization');
            $table->foreign('contractPeriod')->references('id')->on('period');

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
