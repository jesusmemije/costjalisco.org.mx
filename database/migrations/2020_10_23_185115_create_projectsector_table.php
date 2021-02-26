<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateProjectsectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectsector', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 30)->nullable();
            $table->string('titulo', 100)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });

        $rows=[];

        $rows[]=['id'=>'1','titulo'=>'Proyectos de Edificación'];
        $rows[]=['id'=>'2','titulo'=>'Proyectos Restauración y Conservación'];
        $rows[]=['id'=>'3','titulo'=>'Proyectos Urbanos'];
        $rows[]=['id'=>'4','titulo'=>'Proyectos de Infraestructura'];

        foreach ($rows as $row) {
            
            DB::table('projectsector')
            ->insert([
                'id'=>$row['id'],
                'titulo'=>$row['titulo'],
            ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectsector');
    }
}
