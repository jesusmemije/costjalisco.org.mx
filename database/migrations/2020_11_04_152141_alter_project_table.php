<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProjectTable extends Migration
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
        
          $table->foreign('subsector')->references('id')->on('subsector')->onDelete('set null')->onUpdate('cascade');
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
        Schema::table('project', function (Blueprint $table) {
        
        $table->dropForeign('subsector');
    });
    }
}
