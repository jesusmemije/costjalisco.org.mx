<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatfacTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catfac', function (Blueprint $table) {
            $table->id();            
            $table->string('titulo',100);
            $table->timestamps();
        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Económico'];
        $rows[]=['id'=>'2','titulo'=>'Planeación de pre inversión'];
        $rows[]=['id'=>'3','titulo'=>'Factibilidad sustentable'];
        $rows[]=['id'=>'4','titulo'=>'Técnico económica, ecológica o social'];
        $rows[]=['id'=>'5','titulo'=>'Evaluación'];
        $rows[]=['id'=>'6','titulo'=>'Adaptación'];
        $rows[]=['id'=>'7','titulo'=>'Tenencia de la tierra'];
        $rows[]=['id'=>'8','titulo'=>'Financieros'];
        $rows[]=['id'=>'9','titulo'=>'Desarrollo'];
       


        DB::table('catfac')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catfac')
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
        Schema::dropIfExists('catfac');
    }
}
