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
            $table->string('ocid', 50);
            $table->dateTime('updated', 0);	
            $table->text('title');
            $table->text('description');  
            $table->foreignId('status');           
            $table->foreignId('period')->nullable(true);
            $table->foreignId('sector');
            $table->foreignId('subsector');
            $table->text('purpose');
            $table->foreignId('type');
            $table->foreignId('assetlifetime')->nullable(true);;
            $table->double('budget_amount', 10, 2)->nullable(true);	
            $table->dateTime('budget_requestDate', 0)->nullable(true);
            $table->dateTime('budget_approvalDate', 0)->nullable(true);
           
            $table->text('publicAuthority_name');
            $table->foreignId('publicAuthority_id');
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
