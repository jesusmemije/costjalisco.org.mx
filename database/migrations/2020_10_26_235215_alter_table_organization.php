<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableOrganization extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('organization', function (Blueprint $table) {
            $table->foreign('id_identifier')->references('id')->on('identifier')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_address')->references('id')->on('address')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_contact_point')->references('id')->on('contact_point')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('id_partyRole')->references('id')->on('party_role')->onDelete('set null')->onUpdate('cascade');
            


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
