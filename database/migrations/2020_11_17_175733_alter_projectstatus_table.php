<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProjectstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('projectstatus', function (Blueprint $table) {
        
                $rows=[];
                $rows[]=['id'=>'1','titulo'=>'Identificación','descripcion'=>'Identificación se refiere a la decisión de desarrollar un proyecto dentro del presupuesto y programa de un dueño del proyecto (la entidad pública responsable de ejecutar el presupuesto).'];
                $rows[]=['id'=>'2','titulo'=>'Preparación','descripcion'=>'La preparación cubre el estudio de factibilidad, la evaluación del impacto medioambiental y social, el alcance general del proyecto, el marco y la estrategia de adquisiciones, requerimientos legales preliminares sobre el impacto medioambiental y el terreno, y la resultante actualización del presupuesto.'];
                $rows[]=['id'=>'3','titulo'=>'Implementación','descripcion'=>'La implementación cubre las adquisiciones y la implementación del conjunto de trabajos o servicios (tales como diseño y supervisión) a ser entregados bajo el proyecto, incluyendo trabajos o servicios realizados por la entidad compradora. Esto difiere de la definición de “implementación” en OCDS, que cubre la implementación pero no las adquisiciones.'];
                $rows[]=['id'=>'4','titulo'=>'Finalización','descripcion'=>'La finalización cubre el traspaso de los activos y las actividades de cierre con detalles del alcance, costo y fecha de entrega finales.'];
                $rows[]=['id'=>'5','titulo'=>'Completado','descripcion'=>'Las actividades de cierre fueron completadas y este proyecto está inactivo.'];
                $rows[]=['id'=>'6','titulo'=>'Cancelado','descripcion'=>'Este proyecto fue cancelado antes de que las actividades de cierre fueran completadas, y está inactivo. La cancelación puede ocurrir en cualquier momento después de la identificación.'];
                DB::table('projectstatus')->delete();
        
                foreach ($rows as $row) {
                    
                    DB::table('projectstatus')
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
