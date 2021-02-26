<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterSubsectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::table('subsector', function (Blueprint $table) {
        
            

            $rows=[];

            $rows[]=['id'=>'1','titulo'=>'Salud'];
            $rows[]=['id'=>'2','titulo'=>'Comercial'];
            $rows[]=['id'=>'3','titulo'=>'Servicios'];
            $rows[]=['id'=>'4','titulo'=>'Comunicaciones'];
            $rows[]=['id'=>'5','titulo'=>'Transporte'];
            $rows[]=['id'=>'6','titulo'=>'Cultura'];
            $rows[]=['id'=>'7','titulo'=>'Deporte'];
            $rows[]=['id'=>'8','titulo'=>'Educación'];
            $rows[]=['id'=>'9','titulo'=>'Gobierno'];
            $rows[]=['id'=>'10','titulo'=>'Habitacional'];
            $rows[]=['id'=>'11','titulo'=>'Industrial'];
            $rows[]=['id'=>'12','titulo'=>'Recreación'];
            $rows[]=['id'=>'13','titulo'=>'Culto'];
            $rows[]=['id'=>'14','titulo'=>'Turismo'];
            $rows[]=['id'=>'15','titulo'=>'Sitios históricos y artísticos'];
            $rows[]=['id'=>'16','titulo'=>'Monumentos'];
            $rows[]=['id'=>'17','titulo'=>'Edificios religiosos'];
            $rows[]=['id'=>'18','titulo'=>'Militares e instituciones'];
            $rows[]=['id'=>'19','titulo'=>'Construcciones civiles y demás instalaciones o zonas del patrimonio histórico, cultural o artístico'];
            $rows[]=['id'=>'20','titulo'=>'Desarrollos habitacionales'];
            $rows[]=['id'=>'21','titulo'=>'Desarrollos industriales'];
            $rows[]=['id'=>'22','titulo'=>'Complejos turísticos'];
            $rows[]=['id'=>'23','titulo'=>'Espacios públicos'];
            $rows[]=['id'=>'24','titulo'=>'Regeneración e imagen urbana'];
            $rows[]=['id'=>'25','titulo'=>'Integración urbana'];
            $rows[]=['id'=>'26','titulo'=>'Plazas y espacios públicos'];
            $rows[]=['id'=>'27','titulo'=>'Mobiliario urbano'];
            $rows[]=['id'=>'28','titulo'=>'Redes de movilidad y transporte'];
            $rows[]=['id'=>'29','titulo'=>'Arquitectura del paisaje'];
            $rows[]=['id'=>'30','titulo'=>'Puentes'];
            $rows[]=['id'=>'31','titulo'=>'Pasos a desnivel'];
            $rows[]=['id'=>'32','titulo'=>'Túneles'];
            $rows[]=['id'=>'33','titulo'=>'Vías de comunicación y terrestres'];
            $rows[]=['id'=>'34','titulo'=>'Presas'];
            $rows[]=['id'=>'35','titulo'=>'Bordos'];
            $rows[]=['id'=>'36','titulo'=>'Líneas de electrificación'];
            $rows[]=['id'=>'37','titulo'=>'Instalaciones para energía alternativas'];
            $rows[]=['id'=>'38','titulo'=>'Agua potable'];
            $rows[]=['id'=>'39','titulo'=>'Alcantarillado pluvial y sanitario'];
            $rows[]=['id'=>'40','titulo'=>'Plantas de tratamiento'];
            $rows[]=['id'=>'41','titulo'=>'Refinerías y plataformas'];
            $rows[]=['id'=>'42','titulo'=>'Gasoductos'];
            $rows[]=['id'=>'43','titulo'=>'Oleoductos'];
            $rows[]=['id'=>'44','titulo'=>'Muelles'];
            $rows[]=['id'=>'45','titulo'=>'Esclusas'];
            $rows[]=['id'=>'46','titulo'=>'Rompeolas'];
            $rows[]=['id'=>'47','titulo'=>'Vías de ferrocarril y metro'];
            $rows[]=['id'=>'48','titulo'=>'Pistas de aeropuertos'];
            $rows[]=['id'=>'49','titulo'=>'Redes de telecomunicaciones '];
            
            DB::table('subsector')->delete();


            foreach ($rows as $row) {
                
                DB::table('subsector')->insert([


                    'id'=>$row['id'],
                    'titulo'=>$row['titulo'],



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
