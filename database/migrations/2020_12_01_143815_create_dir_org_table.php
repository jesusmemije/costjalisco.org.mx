<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDirOrgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dir_org', function (Blueprint $table) {
            $table->id();

            $table->string('institucion',150)->nullable();
            $table->string('titular',100)->nullable();
            $table->string('titular_cargo',100)->nullable();
            $table->string('enlace',100)->nullable();
            $table->string('enlace_cargo',100)->nullable();
            $table->string('sector',40)->nullable();
            $table->timestamps();
        });

           
        $rows=[];
        $rows[]=['id'=>'1','institucion'=>'Gobierno del Estado de Jalisco','titular'=>'Enrique Alfaro Ramírez','titular_cargo'=>'Gobernador de Jalisco','enlace'=>'David Miguel Zamora Bueno','enlace_cargo'=>'Secretario de Infraestructura y Obra Pública','sector'=>'Sector Público'];
        $rows[]=['id'=>'2','institucion'=>'Ayuntamiento de Guadalajara','titular'=>'Ismael del Toro Castro','titular_cargo'=>'Presidente Municipal','enlace'=>'Ruth Irais Ruíz Velasco','enlace_cargo'=>'Directora de Transparencia y Buenas Prácticas','sector'=>'Sector Público'];
        $rows[]=['id'=>'3','institucion'=>'Ayuntamiento de Zapopan','titular'=>'Jesús Pablo Lemus Navarro','titular_cargo'=>'Presidente Municipal','enlace'=>'Rocío Selene Aceves Ramírez','enlace_cargo'=>'Directora de Transparencia y Buenas Prácticas','sector'=>'Sector Público'];
        $rows[]=['id'=>'4','institucion'=>'Ayuntamiento de Tonalá','titular'=>'Juan Antonio González Mora','titular_cargo'=>'Presidente Municipal','enlace'=>'Aislinn Lizeth Ramos Rubio','enlace_cargo'=>'Directora de Transparencia','sector'=>'Sector Público'];
        $rows[]=['id'=>'5','institucion'=>'Instituto de Transparencia, Información Pública y Protección de Datos Personales del Estado de Jalisco (ITEI) (Preside)','titular'=>'Cynthia Patricia Cantero Pacheco','titular_cargo'=>'Comisionada Presidente / Presidente de GMS','enlace'=>'Claudia Patricia Arteaga Arróniz','enlace_cargo'=>'Coordinadora General de Planeación y Proyectos Estratégicos / Gerente','sector'=>'Sector Público'];
        $rows[]=['id'=>'6','institucion'=>'Instituto Nacional de Transparencia, Acceso a la Información y Protección de Datos Personales (INAI)','titular'=>'Francisco Javier Acuña Llamas','titular_cargo'=>'Comisionado Presidente','enlace'=>'Diego Ernesto Díaz Iturbe','enlace_cargo'=>'Subdirector de Análisis y Estudios de Ponencia','sector'=>'Sector Público'];
        
        $rows[]=['id'=>'7','institucion'=>'Universidad de Guadalajara (UdeG)','titular'=>'Ricardo Villanueva Lomelí','titular_cargo'=>'Rector','enlace'=>'Natalia Mendoza Servín','enlace_cargo'=>'Coordinadora de Transparencia y Archivo General','sector'=>'Sector Académico'];
        $rows[]=['id'=>'8','institucion'=>'Instituto Tecnológico y de Estudios Superiores de Occidente AC (ITESO)','titular'=>'Luis Arriaga Valenzuela, SJ','titular_cargo'=>'Rector','enlace'=>'José Bautista Farías','enlace_cargo'=>'Profesor Investigador','sector'=>'Sector Académico'];
        
        $rows[]=['id'=>'9','institucion'=>'Cámara Mexicana de la Industria de la Construcción Delegación Jalisco (CMIC Jalisco)','titular'=>'Carlos del Río Madrigal','titular_cargo'=>'Presidente','enlace'=>'Arturo Rafael Salazar Martín del Campo','enlace_cargo'=>'Vicepresidente de Evaluación, Seguimiento y Estadística','sector'=>'Sector Privado'];
        $rows[]=['id'=>'10','institucion'=>'Colegio de Ingenieros Civiles del Estado de Jalisco (CICEJ)','titular'=>'Bernardo Sáenz Barba','titular_cargo'=>'Presidente','enlace'=>'Betzabé Aviña Rojas','enlace_cargo'=>'1er. Secretario Suplente','sector'=>'Sector Privado'];
        $rows[]=['id'=>'11','institucion'=>'Consejo Mexicano de Comercio Exterior de Occidente A.C. (COMCE)','titular'=>'Miguel Ángel Landeros Volquarts','titular_cargo'=>'Presidente','enlace'=>'Felipe Vázquez Collignon','enlace_cargo'=>'Representante','sector'=>'Sector Privado'];
       
        $rows[]=['id'=>'12','institucion'=>'Comité de Participación Social del Sistema Estatal Anticorrupción (CPS)','titular'=>'Annel A. Vázquez Anderson','titular_cargo'=>'Presidente','enlace'=>'Nancy García Vázquez','enlace_cargo'=>'Integrante','sector'=>'Sociedad Civil Organizada'];
        $rows[]=['id'=>'13','institucion'=>'Colectivo Ciudadanos por Municipios Transparentes (CIMTRA)','titular'=>'Carlos Javier Aguirre Arias','titular_cargo'=>'Coordinador Nacional - CIMTRA Jalisco','enlace'=>'Cesar Omar Mora Pérez','enlace_cargo'=>'Miembro','sector'=>'Sociedad Civil Organizada'];
        $rows[]=['id'=>'14','institucion'=>'México Evalúa, Centro de Análisis de Políticas Públicas A.C.','titular'=>'Edna Jaime Treviño','titular_cargo'=>'Directora General','enlace'=>'Mariana Campos','enlace_cargo'=>'Coordinadora del Programa de Gasto Público y Rendición de Cuentas','sector'=>'Sociedad Civil Organizada'];
        
        $rows[]=['id'=>'15','institucion'=>'Transversal Think Tank','titular'=>'David Gómez Álvarez','titular_cargo'=>'Director Ejecutivo','enlace'=>'Alicia Espinoza','enlace_cargo'=>'Integrante','sector'=>'Aliados Estratégicos'];
        


        
        DB::table('dir_org')->delete();
    
        foreach ($rows as $row) {
            
            DB::table('dir_org')
            ->insert([

                'id'=>$row['id'],
                'institucion'=>$row['institucion'],
                'titular'=>$row['titular'],
                'titular_cargo'=>$row['titular_cargo'],
                'enlace'=>$row['enlace'],
                'enlace_cargo'=>$row['enlace_cargo'],
                'sector'=>$row['sector'],
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
        Schema::dropIfExists('dir_org');
    }
}
