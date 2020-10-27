<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_roles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_organization');          
            $table->foreignId('id_party_role');
            $table->timestamps();

            $table->foreign('id_organization')->references('id')->on('organization');

            $table->foreign('id_party_role')->references('id')->on('party_role');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_roles');
    }
}
