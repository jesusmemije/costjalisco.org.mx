<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCattipoContratoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cattipo_contrato', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',50);
            $table->timestamps();
        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Servicios'];
        $rows[]=['id'=>'2','titulo'=>'Producto'];
        $rows[]=['id'=>'3','titulo'=>'Obras'];
        DB::table('cattipo_contrato')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('cattipo_contrato')
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
        Schema::dropIfExists('cattipo_contrato');
    }
}
