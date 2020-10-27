<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectBudgetbreakdown extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_budgetbreakdown', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project');
            $table->foreign('id_project')->references('id')->on('project');
            $table->foreignId('id_budget');
            $table->foreign('id_budget')->references('id')->on('budget_breakdown');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_budgetbreakdown');
    }
}
