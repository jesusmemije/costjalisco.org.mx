<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContractingprocessStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractingprocess_status', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->nullable();
            $table->text('titulo')->nullable();
            $table->string('descripcion', 300)->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Publicación de convocatoria'];
        $rows[]=['id'=>'2','titulo'=>'Visita a lugar de la obra'];
        $rows[]=['id'=>'3','titulo'=>'Junta aclaratoria'];
        $rows[]=['id'=>'4','titulo'=>'Modificación de convocatoria'];
        $rows[]=['id'=>'5','titulo'=>'Presentación y apertura de proposiciones'];
        $rows[]=['id'=>'6','titulo'=>'Evaluación y calificación'];
        $rows[]=['id'=>'7','titulo'=>'Dictamen del fallo'];
        $rows[]=['id'=>'8','titulo'=>'Privado'];
        $rows[]=['id'=>'9','titulo'=>'Fallo'];

        DB::table('contractingprocess_status')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('contractingprocess_status')
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
        Schema::dropIfExists('contractingprocess_status');
    }
}
