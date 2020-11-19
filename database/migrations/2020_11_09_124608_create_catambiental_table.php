<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatambientalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catambiental', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',100);
            $table->timestamps();
        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Ambiental'];
        $rows[]=['id'=>'2','titulo'=>'Ecológico'];

        DB::table('catambiental')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('catambiental')
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
        Schema::dropIfExists('catambiental');
    }
}
