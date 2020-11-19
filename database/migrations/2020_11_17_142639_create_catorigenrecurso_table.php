<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatorigenrecursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catorigenrecurso', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->timestamps();
        });
        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Federal'];
        $rows[]=['id'=>'2','titulo'=>'Estatal'];
        $rows[]=['id'=>'3','titulo'=>'Municipal'];
        $rows[]=['id'=>'4','titulo'=>'Privado'];

        DB::table('catorigenrecurso')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catorigenrecurso')
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
        Schema::dropIfExists('catorigenrecurso');
    }
}
