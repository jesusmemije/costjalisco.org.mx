<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableContractingProcess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('contracting_process', function (Blueprint $table) {

           $table->foreign('id_summary')->references('id')->on('summary')->onDelete('cascade')->onUpdate('cascade');
           $table->foreign('id_relases')->references('id')->on('contract_relases')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::table('contracting_process', function (Blueprint $table) {
        $table->dropForeign('id_summary');
        $table->dropForeign('id_relases');

        });

    }
}
