<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateModificationTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modification_type', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 20)->nullable();
            $table->string('titulo', 40)->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
        $rows=[];
        $rows[]=['id'=>'1','titulo'=>'Duración','descripcion'=>'Esta modificación describe un cambio a la duración del contrato. Este puede ser identificado en base a los cambios en award.contractPeriod o contract.period, o actualizaciones a hitos y pagos que parezcan exceder el contract.period anticipado.'];
        $rows[]=['id'=>'2','titulo'=>'Valor','descripcion'=>'Esta modificación describe un cambio en el valor del contrato. Esto puede ser identificado en base a cambios en la suma de contract.value (observando los casos en los que el valor de un contrato varía, o se firma un contrato de extensión adicional como parte de este proceso), o monitoreando contract.implementation.transactions.'];
        $rows[]=['id'=>'3','titulo'=>'Alcance','descripcion'=>'Esta modificación describe un cambio al alcance del contrato. Esto puede ser identificado comparando detalles clave de tender, awards y contracts o monitoreando documentos relevantes.'];

        DB::table('modification_type')->delete();
        
        foreach ($rows as $row) {
            
            DB::table('modification_type')
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
        Schema::dropIfExists('modification_type');
    }
}
