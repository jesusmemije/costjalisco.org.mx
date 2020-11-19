<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProjecttypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('projecttype', function (Blueprint $table) {
        
            $rows=[];
            $rows[]=['id'=>'1','titulo'=>'Construcción','descripcion'=>'El foco principal de este proyecto es la construcción de un nuevo activo.'];
            $rows[]=['id'=>'2','titulo'=>'Rehabilitación','descripcion'=>'El foco principal de este proyecto es la rehabilitación de un activo existente.'];
            $rows[]=['id'=>'3','titulo'=>'Reemplazo','descripcion'=>'El foco principal de este proyecto es el reemplazo de un activo existente.'];
            $rows[]=['id'=>'4','titulo'=>'Expansión','descripcion'=>'El enfoque primario de este proyecto es la expansión de un activo existente.'];

            DB::table('projecttype')->delete();
        
                foreach ($rows as $row) {
                    
                    DB::table('projecttype')
                    ->insert([

                        'id'=>$row['id'],
                        'titulo'=>$row['titulo'],
                        'descripcion'=>$row['descripcion'],
                    ]);

                }


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
