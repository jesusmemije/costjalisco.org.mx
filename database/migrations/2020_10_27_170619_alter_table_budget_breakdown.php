<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableBudgetBreakdown extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::table('budget_breakdown', function (Blueprint $table) {
         
            $table->foreign('id_period')->references('id')->on('period')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('sourceParty_id')->references('id')->on('organization')->onDelete('cascade')->onUpdate('cascade');

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
