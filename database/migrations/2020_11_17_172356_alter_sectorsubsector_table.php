<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterSectorsubsectorTable extends Migration
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
        
        

            $rows[]=['id'=>'1','id_sector'=>'1','id_subsector'=>'1'];
            $rows[]=['id'=>'2','id_sector'=>'1','id_subsector'=>'2'];
            $rows[]=['id'=>'3','id_sector'=>'1','id_subsector'=>'3'];
            $rows[]=['id'=>'4','id_sector'=>'1','id_subsector'=>'4'];
            $rows[]=['id'=>'5','id_sector'=>'1','id_subsector'=>'5'];
            $rows[]=['id'=>'6','id_sector'=>'1','id_subsector'=>'6'];
            $rows[]=['id'=>'7','id_sector'=>'1','id_subsector'=>'7'];
            $rows[]=['id'=>'8','id_sector'=>'1','id_subsector'=>'8'];
            $rows[]=['id'=>'9','id_sector'=>'1','id_subsector'=>'9'];
            $rows[]=['id'=>'10','id_sector'=>'1','id_subsector'=>'10'];
            $rows[]=['id'=>'11','id_sector'=>'1','id_subsector'=>'11'];
            $rows[]=['id'=>'12','id_sector'=>'1','id_subsector'=>'12'];
            $rows[]=['id'=>'13','id_sector'=>'1','id_subsector'=>'13'];
            $rows[]=['id'=>'14','id_sector'=>'1','id_subsector'=>'14'];

            $rows[]=['id'=>'15','id_sector'=>'2','id_subsector'=>'15'];
            $rows[]=['id'=>'16','id_sector'=>'2','id_subsector'=>'16'];
            $rows[]=['id'=>'17','id_sector'=>'2','id_subsector'=>'17'];
            $rows[]=['id'=>'18','id_sector'=>'2','id_subsector'=>'18'];
            $rows[]=['id'=>'19','id_sector'=>'2','id_subsector'=>'19'];

            $rows[]=['id'=>'20','id_sector'=>'3','id_subsector'=>'20'];
            $rows[]=['id'=>'21','id_sector'=>'3','id_subsector'=>'21'];
            $rows[]=['id'=>'22','id_sector'=>'3','id_subsector'=>'22'];
            $rows[]=['id'=>'23','id_sector'=>'3','id_subsector'=>'23'];
            $rows[]=['id'=>'24','id_sector'=>'3','id_subsector'=>'24'];
            $rows[]=['id'=>'25','id_sector'=>'3','id_subsector'=>'25'];
            $rows[]=['id'=>'26','id_sector'=>'3','id_subsector'=>'26'];
            $rows[]=['id'=>'27','id_sector'=>'3','id_subsector'=>'27'];
            $rows[]=['id'=>'28','id_sector'=>'3','id_subsector'=>'28'];
            $rows[]=['id'=>'29','id_sector'=>'3','id_subsector'=>'29'];

            $rows[]=['id'=>'30','id_sector'=>'4','id_subsector'=>'30'];
            $rows[]=['id'=>'31','id_sector'=>'4','id_subsector'=>'31'];
            $rows[]=['id'=>'32','id_sector'=>'4','id_subsector'=>'32'];
            $rows[]=['id'=>'33','id_sector'=>'4','id_subsector'=>'33'];
            $rows[]=['id'=>'34','id_sector'=>'4','id_subsector'=>'34'];
            $rows[]=['id'=>'35','id_sector'=>'4','id_subsector'=>'35'];
            $rows[]=['id'=>'36','id_sector'=>'4','id_subsector'=>'36'];
            $rows[]=['id'=>'37','id_sector'=>'4','id_subsector'=>'37'];
            $rows[]=['id'=>'38','id_sector'=>'4','id_subsector'=>'38'];
            $rows[]=['id'=>'39','id_sector'=>'4','id_subsector'=>'39'];
            $rows[]=['id'=>'40','id_sector'=>'4','id_subsector'=>'40'];
            $rows[]=['id'=>'41','id_sector'=>'4','id_subsector'=>'41'];
            $rows[]=['id'=>'42','id_sector'=>'4','id_subsector'=>'42'];
            $rows[]=['id'=>'43','id_sector'=>'4','id_subsector'=>'43'];
            $rows[]=['id'=>'44','id_sector'=>'4','id_subsector'=>'44'];
            $rows[]=['id'=>'45','id_sector'=>'4','id_subsector'=>'45'];
            $rows[]=['id'=>'46','id_sector'=>'4','id_subsector'=>'46'];
            $rows[]=['id'=>'47','id_sector'=>'4','id_subsector'=>'47'];
            $rows[]=['id'=>'48','id_sector'=>'4','id_subsector'=>'48'];
            $rows[]=['id'=>'49','id_sector'=>'4','id_subsector'=>'49'];


            DB::table('sectorsubsector')->delete();


            foreach ($rows as $row) {
                
                DB::table('sectorsubsector')->insert([


                    'id'=>$row['id'],
                    'id_sector'=>$row['id_sector'],
                    'id_subsector'=>$row['id_subsector'],



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
