<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterPartyRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('party_role', function (Blueprint $table) {

            $table->string('codigo', 100)->nullable()->change();
            $table->string('titulo', 100)->nullable()->change();
            $table->string('descripcion', 300)->nullable()->change();
            $table->string('fuente', 20)->nullable()->change();
      });

      $rows=[];
      $rows[]=['id'=>'1','titulo'=>'Comprador','descripcion'=>'Un comprador es una entidad cuyo presupuesto se utilizará para pagar bienes, obras o servicios relacionados con un contrato.','fuente'=>'OCDS'];
      $rows[]=['id'=>'2','titulo'=>'Entidad de adquisición','descripcion'=>'La entidad que está administrando la adquisición. Esta puede ser diferente del comprador que paga, o usa, los artículos que están siendo adquiridos.','fuente'=>'OCDS'];
      $rows[]=['id'=>'3','titulo'=>'Proveedor','descripcion'=>'Una entidad adjudicada o contratada para proveer bienes, obras o servicios.','fuente'=>'OCDS'];
      $rows[]=['id'=>'4','titulo'=>'Licitante','descripcion'=>'Todas las entidades que presentan una oferta.','fuente'=>'OCDS'];
      $rows[]=['id'=>'5','titulo'=>'Financiador','descripcion'=>'El financiador es una entidad que provee dinero o financiamiento para este proceso de contratación o proyecto.','fuente'=>'OC4IDS'];
      $rows[]=['id'=>'6','titulo'=>'Persona que solicita información','descripcion'=>'Una parte que ha realizado un pedido de información durante la fase de solicitudes de información de un proceso de contratación.','fuente'=>'OCDS'];
      $rows[]=['id'=>'7','titulo'=>'Pagador','descripcion'=>'Una parte que hace un pago en una transacción.','fuente'=>'OCDS'];
      $rows[]=['id'=>'8','titulo'=>'Beneficiario','descripcion'=>'Una parte que recibe un pago en una transacción.','fuente'=>'OCDS'];
      $rows[]=['id'=>'9','titulo'=>'Órgano de revisión','descripcion'=>'Una parte responsable de la revisión de este proceso de adquisición. Esta parte tiene a menudo un papel en cualquier cuestionamiento hecho a la adjudicación del contrato.','fuente'=>'OCDS'];
      $rows[]=['id'=>'10','titulo'=>'Parte interesada','descripcion'=>'Una parte que ha expresado interés en el proceso de contratación: por ejemplo, comprando documentación del concurso o presentando preguntas aclaratorias.','fuente'=>'OCDS'];
      $rows[]=['id'=>'11','titulo'=>'Autoridad Pública','descripcion'=>'La entidad responsable de desarrollar los activos de infraestructura y/o de entregar los servicios públicos en este proyecto.','fuente'=>'OC4IDS'];
      $rows[]=['id'=>'12','titulo'=>'Entidad Administrativa','descripcion'=>'La entidad responsable de la administración de contratos.','fuente'=>'OC4IDS'];

      DB::table('party_role')->delete();
        
                foreach ($rows as $row) {
                    
                    DB::table('party_role')
                    ->insert([

                        'id'=>$row['id'],
                        'titulo'=>$row['titulo'],
                        'descripcion'=>$row['descripcion'],
                        'fuente'=>$row['fuente'],
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
        //
    }
}
