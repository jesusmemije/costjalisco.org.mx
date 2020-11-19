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
            $table->foreignId('id_project')->nullable()->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_project')->references('id')->on('project')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('id_budget')->nullable();
            $table->foreign('id_budget')->references('id')->on('budget_breakdown')->onDelete('cascade')->onUpdate('cascade');
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
