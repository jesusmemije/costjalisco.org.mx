<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterPartyRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('party_role', function (Blueprint $table) {
        
            $table->string('codigo', 100)->nullable()->change();
            $table->string('titulo', 20)->nullable()->change();
            $table->string('descripcion', 300)->nullable()->change();
            $table->string('fuente', 20)->nullable()->change();
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
