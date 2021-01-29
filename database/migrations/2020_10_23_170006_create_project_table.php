<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();		
            $table->string('ocid', 50)->nullable();
            $table->dateTime('updated', 0)->nullable();	
            $table->text('title')->nullable();
            $table->text('description')->nullable(); 
            $table->foreignId('status')->nullable();
            $table->foreignId('period')->nullable(true);
            $table->integer('people')->nullable();
            $table->integer('porcentaje_obra',3)->nullable()->autoIncrement(false);
            $table->foreignId('sector')->nullable();
            $table->foreignId('subsector')->nullable();
            $table->text('purpose')->nullable();
            $table->foreignId('type')->nullable();
            $table->foreignId('assetlifetime')->nullable(true);
            $table->text('observaciones')->nullable();
            $table->double('budget_amount', 10, 2)->nullable(true);	
            $table->dateTime('budget_requestDate', 0)->nullable(true);
            $table->dateTime('budget_approvalDate', 0)->nullable(true);
            $table->text('publicAuthority_name')->nullable();
            $table->foreignId('publicAuthority_id')->nullable();
            $table->foreignId('id_completion')->nullable(true);;
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';


        });

       
       
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
    }
}
