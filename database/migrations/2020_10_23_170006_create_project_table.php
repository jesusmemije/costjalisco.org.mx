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
            $table->foreignId('period');
            $table->foreignId('sector');
            $table->text('purpose');
            $table->foreignId('type');
            $table->foreignId('assetlifetime');
            $table->double('budget_amount', 10, 2);	
            $table->dateTime('budget_requestDate', 0);
            $table->dateTime('budget_approvalDate', 0);
           
            $table->text('publicAuthority_name');
            $table->foreignId('publicAuthority_id');
            $table->foreignId('id_completion');
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
