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
            $table->foreign('status')->references('id')->on('projectstatus')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('period')->references('id')->on('period')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('sector')->references('id')->on('projectsector')->onDelete('set null')->onUpdate('cascade');
           
            $table->foreign('type')->references('id')->on('projecttype')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('assetlifetime')->references('id')->on('period')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('publicAuthority_id')->references('id')->on('organization')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_completion')->references('id')->on('completion')->onDelete('set null')->onUpdate('cascade');
                     
            
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
