<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatmodalidadContratacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catmodalidad_contratacion', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',50);
            $table->timestamps();
        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Precios unitarios'];
        $rows[]=['id'=>'2','titulo'=>'Precio alzado'];
        $rows[]=['id'=>'3','titulo'=>'Mixto'];
        $rows[]=['id'=>'4','titulo'=>'Amortización programada'];
        $rows[]=['id'=>'5','titulo'=>'Llave en mano'];
        DB::table('catmodalidad_contratacion')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catmodalidad_contratacion')
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
        Schema::dropIfExists('catmodalidad_contratacion');
    }
}
