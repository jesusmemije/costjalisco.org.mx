<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatmodalidadAdjudicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catmodalidad_adjudicacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->timestamps();
        });


        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Licitación pública'];
        $rows[]=['id'=>'2','titulo'=>'Concurso simplificado sumario'];
        $rows[]=['id'=>'3','titulo'=>'Invitación a cuando menos tres personas'];
        $rows[]=['id'=>'4','titulo'=>'Adjudicación directa'];

        DB::table('catmodalidad_adjudicacion')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catmodalidad_adjudicacion')
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
        Schema::dropIfExists('catmodalidad_adjudicacion');
    }
}
