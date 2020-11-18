<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatimpactoterrenoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catimpactoterreno', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            
            $table->timestamps();
        });


        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Agrología y desarrollo pecuario'];
        $rows[]=['id'=>'2','titulo'=>'Hidrología'];
        $rows[]=['id'=>'3','titulo'=>'Mecánica de suelos'];
        $rows[]=['id'=>'4','titulo'=>'Sismología'];
        $rows[]=['id'=>'5','titulo'=>'Topografía'];
        $rows[]=['id'=>'6','titulo'=>'Geología'];
        $rows[]=['id'=>'7','titulo'=>'Geodesia'];
        $rows[]=['id'=>'8','titulo'=>'Geotécnia'];
        $rows[]=['id'=>'9','titulo'=>'Geofísica'];
        $rows[]=['id'=>'10','titulo'=>'Geotermia'];
        $rows[]=['id'=>'11','titulo'=>'Oceanografía'];
        $rows[]=['id'=>'12','titulo'=>'Meteorología'];
        $rows[]=['id'=>'13','titulo'=>'Aerofotogrametría'];
        $rows[]=['id'=>'14','titulo'=>'Ingeniería de tránsito'];


        DB::table('catimpactoterreno')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catimpactoterreno')
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
        Schema::dropIfExists('catimpactoterreno');
    }
}
