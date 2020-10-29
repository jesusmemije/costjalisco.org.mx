<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('project', function (Blueprint $table) {
            $table->foreign('status')->references('id')->on('projectstatus');
            $table->foreign('period')->references('id')->on('period');
            $table->foreign('sector')->references('id')->on('projectsector');
            $table->foreign('type')->references('id')->on('projecttype');
            $table->foreign('assetlifetime')->references('id')->on('period');
            $table->foreign('publicAuthority_id')->references('id')->on('organization');
            $table->foreign('id_completion')->references('id')->on('completion');
                     
            
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

        Schema::table('project', function(Blueprint $table)
        {
        $table->dropForeign('status'); //
        });
    }
}
