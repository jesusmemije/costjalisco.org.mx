<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAdditionalidentifiers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('additionalidentifiers', function (Blueprint $table) {
         
            
            $table->foreign('id_organization')->references('id')->on('organization')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_identifier')->references('id')->on('identifier')->onDelete('cascade')->onUpdate('cascade');
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
