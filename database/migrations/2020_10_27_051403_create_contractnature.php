<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContractnature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractnature', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->nullable();
            $table->string('titulo', 40)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });

        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Diseño','descripcion'=>'Este proceso de contratación está relacionado al diseño del proyecto.'];
        $rows[]=['id'=>'2','titulo'=>'Construcción','descripcion'=>'Este proceso de contratación está relacionado a trabajos de construcción del proyecto.'];
        $rows[]=['id'=>'3','titulo'=>'Supervisión','descripcion'=>'Este proceso de contratación está relacionado a la supervisión o monitoreo de este proyecto.'];

        DB::table('contractnature')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('contractnature')
            ->insert([

                'id'=>$row['id'],
                'titulo'=>$row['titulo'],
                'descripcion'=>$row['descripcion'],
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
        Schema::dropIfExists('contractnature');
    }
}
