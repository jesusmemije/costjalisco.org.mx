<?php

namespace App\Exports;

use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use stdClass;

class ProjectDataExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromCollection,ShouldAutoSize, WithStyles,WithCustomValueBinder 
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
    public function styles(Worksheet $sheet)
    {   
       

        
     return [
            // Style the first row as bold text.

         
            'A' => ['font' => ['bold' => true]],
            'a' => ['font' => ['bold' => true]],

         
        ];


    }
    public function collection()
    {


        $project = Project::find($this->id);

        $project_documents = DB::table('project_documents')
        ->join('documents', 'project_documents.id_document', '=', 'documents.id')
        ->where('id_project', '=', $this->id)
        ->get();



    $docs=array();
    $identificacion = array();
    $preparacion = array();
    $contratacion = array();
    $ejecucion = array();
    $finalizacion = array();

    foreach ($project_documents as $document) {
        $aux=asset('documents/'.$document->url);
        array_push($docs,$aux);
        switch ($document->description) {
            case 'identificacion':
                array_push($identificacion, $document->url);
                break;
            case 'preparacion':
                array_push($preparacion, $document->url);
                break;
            case 'contratacion':
                array_push($contratacion, $document->url);
                break;
            case 'ejecucion':
                array_push($ejecucion, $document->url);
                break;
            case 'finalizacion':
                array_push($finalizacion, $document->url);
                break;
        }
    }
    $docs=implode('|',$docs);

    $all = DB::table('project')
        
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
        ->leftJoin('proyecto_ejecucion', 'project.id', '=', 'proyecto_ejecucion.id_project')
        ->leftJoin('proyecto_finalizacion', 'project.id', '=', 'proyecto_finalizacion.id_project')
        ->select(
            'project.*',
            'generaldata.*',
            'locations.*',
            'locations.description as descriptionlocation',
            'estudiosambiental.*',
            'estudiosfactibilidad.*',
            'estudiosimpacto.*',
            'proyecto_contratacion.*',
            'proyecto_ejecucion.*',
            'proyecto_ejecucion.*',
            'proyecto_finalizacion.*',
            'project.id as id_project'
        )
        ->where('project.id', '=', $this->id)
        ->first();
        
  

   $responsableproyecto=DB::table('responsableproyecto')
   ->where('id_project',$this->id)
   ->first();
   
   $tipoAmbiental=DB::table('catambiental')
   ->where('id','=',$all->tipoAmbiental)
   ->select('titulo')
   ->first();

   if(!$tipoAmbiental){
       $tipoAmbiental=new stdClass();
       $tipoAmbiental->titulo="";
   }


   $tipoFactibilidad=DB::table('catfac')
   ->where('id','=',$all->tipoFactibilidad)
   ->select('titulo')
   ->first();
   if($tipoFactibilidad==null){
       $tipoFactibilidad=new stdClass();
       $tipoFactibilidad->titulo="";
   }

   $tipoImpacto=DB::table('catimpactoterreno')
   ->where('id','=',$all->tipoImpacto)
   ->select('titulo')
   ->first();

   if(!$tipoImpacto){
       $tipoImpacto=new stdClass();
       $tipoImpacto->titulo="";
   }

   $origenrecurso=DB::table('project_budgetbreakdown')
    ->join('budget_breakdown','project_budgetbreakdown.id_budget','=','budget_breakdown.id')
    ->join('period','budget_breakdown.id_period','=','period.id')
    ->where('id_project',$this->id)
    ->first();

    if($origenrecurso!=null){
        
        $catorigenrecurso=DB::table('catorigenrecurso')
        ->where('id','=',$origenrecurso->description)
        ->first();
    }else{

        $origenrecurso=new stdClass();
        $origenrecurso->sourceParty_name="";
        $origenrecurso->origenrecurso="";
        $origenrecurso->startDate="";
        $catorigenrecurso=new stdClass();
        $catorigenrecurso->titulo="";
      
    }


    $empresas = $all->empresasparticipantes;
    $empresasparticipantes = explode(",", $empresas);

    $sector=DB::table('projectsector')
    ->where('id','=',$project->sector)
    ->select('titulo')
    ->first();
    $sector=$sector->titulo;

    $subsector = DB::table('subsector')
        ->where('id', '=', $project->subsector)
        ->select('titulo')
        ->first();
    $subsector=$subsector->titulo;

    $projecttype=DB::table('projecttype')
         ->where('id', '=', $project->type)
        ->select('titulo')
        ->first();
    $projecttype=$projecttype->titulo;

    $address=DB::table('address')
    ->where('id','=',$all->id_address)
    ->first();

  


    $people=$project->people;


    

   

  

            
    //validate null 
    $tipocontrato = DB::table('cattipo_contrato')
        ->where('id', '=', $all->tipocontrato)
        ->first();
    if ($tipocontrato == null) {
        $tipocontrato = new stdClass();
        $tipocontrato->titulo = "";
    }

    //Contratación.

    $modalidadcontratacion = DB::table('catmodalidad_contratacion')
        ->where('id', '=', $all->modalidadcontrato)
        ->first();
    if ($modalidadcontratacion == null) {
        $modalidadcontratacion = new stdClass();
        $modalidadcontratacion->titulo = "";
    }



    $modalidadadjudicacion = DB::table('catmodalidad_adjudicacion')
        ->where('id', '=', $all->modalidadadjudicacion)
        ->first();

        if ($modalidadadjudicacion == null) {
            $modalidadadjudicacion = new stdClass();
            $modalidadadjudicacion->titulo = "";
        }
    $estadoactual = DB::table('contractingprocess_status')
        ->where('id', '=', $all->estadoactual)
        ->first();
        if ($estadoactual == null) {
            $estadoactual = new stdClass();
            $estadoactual->titulo = "";
        }
    

    $project_imgs=DB::table('projects_imgs')
    ->where('id_project','=',$project->id)
    ->get();

    /***Rutas para las imagenes del proyecto */
    $rutas=array();

    foreach($project_imgs as $ruta){
        $aux=asset('projects_imgs/'.$ruta->imgroute);
        array_push($rutas, $aux);
    }
    $rutas=implode("|",$rutas);

  
$export=  new Collection([
  
    ['id_project',$all->id_project],
    ['Nombre de la persona que registra el proyecto',$all->responsable],
    ['Correo electrónico (Institucional)',$all->email],
    ['Organismo al que pertenece',$all->organismo],
    ['Puesto que desempeña dentro del organismo',$all->puesto],
    ['En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar',$all->involucrado],
    ['Imágenes de la obra',$rutas],
    ['Título del proyecto',$all->title],
    ['Número que identifica al proyecto',$all->ocid],
    ['Descripción',$all->description],
    ['Próposito',$all->purpose],
    ['Sector',$sector],
    ['Subsector',$subsector],
    ['Tipo de proyecto',$projecttype],
    ['Personas beneficiadas',$people],
    ['Calle',$address->streetAddress],
    ['Localidad',$address->locality],
    ['Región',$address->region],
    ['Código Postal',$address->postalCode],
    ['País',$address->countryName],
    ['Descripción del lugar',$all->descriptionlocation],
    ['Nombre del responsable del proyecto',$responsableproyecto->nombreresponsable],
    ['Cargo',$responsableproyecto->cargoresponsable],
    ['Télefono',$responsableproyecto->telefonoresponsable],
    ['Correo electrónico',$responsableproyecto->correoresponsable],
    ['Domicilio',$responsableproyecto->domicilioresponsable],
    ['Horario de oficina',$responsableproyecto->horarioresponsable],
    ['Estudios de Impacto Ambiental',$tipoAmbiental->titulo],
    ['Fecha de realización',$all->fecharealizacionAmbiental],
    ['Responsable del estudio',$all->responsableAmbiental],
    ['Número o números de identificación del estudio de impacto ambiental',$all->numeros_ambiental],
    ['Estudios de Factibilidad',$tipoFactibilidad->titulo],
    ['Fecha de realización',$all->fecharealizacionFactibilidad],
    ['Responsable del estudio',$all->responsableFactibilidad],
    ['Número o números de identificación del estudio de factibilidad',$all->numeros_factibilidad],
    ['Estudios de Impacto en el terreno y asentamientos',$tipoImpacto->titulo],
    ['Fecha de realización',$all->fecharealizacionimpacto],
    ['Responsable del estudio',$all->responsableImpacto],
    ['Número o números de identificación del estudio de factibilidad',$all->numeros_impacto],
    ['Origen del recurso',$catorigenrecurso->titulo],
    ['Fondo o fuente de financiamiento y partida presupuestal',$origenrecurso->sourceParty_name],
    ['Fecha de aprobación del monto de recurso autorizado',$origenrecurso->startDate],
    ['Datos de contacto de la entidad de adjudicación',$all->datosdecontacto],
    ['Fecha de publicación',$all->fechapublicacion],
    ['Entidad de adjudicación',$all->entidadadjudicacion],
    ['Nombre del responsable',$all->nombreresponsable],
    ['Modalidad de la adjudicación',$modalidadadjudicacion->titulo],
    ['Tipo de contrato',$tipocontrato->titulo],
    ['Modalidad de de contratación',$modalidadcontratacion->titulo],
    ['Estado actual de la contratación',$estadoactual->titulo],
    ['Empresas participantes',$all->empresasparticipantes],
    ['Entidad administradora del contrato',$all->entidad_admin_contrato],
    ['Título del contrato',$all->titulocontrato],
    ['Empresa contratada',$all->empresacontratada],
    ['Vía por la que presenta su propuesta',$all->viapropuesta],
    ['Fecha de presentación de su propuesta',$all->fechapresentacionpropuesta],
    ['Monto del contrato',$all->montocontrato],
    ['Alcance del trabajo según el contrato',$all->alcancecontrato],
    ['Fecha de inicio del contrato',$all->fechainiciocontrato],
    ['Duración del proyecto de acuerdo con lo establecido en el contrato',$all->duracionproyecto_contrato],
    ['Variaciones en el precio del contrato',$all->variacionespreciocontrato],
    ['Razones de cambio en el precio del contrato',$all->razonescambiopreciocontrato],
    ['Variaciones en la duración del contrato',$all->variacionesduracioncontrato],
    ['Razones de cambio en la duración del contrato',$all->razonescambioduracioncontrato],
    ['Variaciones en el alcance del contrato',$all->variacionesalcancecontrato],
    ['Razones de cambios en el alcance del contrato',$all->razonescambiosalcancecontrato],
    ['Aplicación de escalatoria',$all->aplicacionescalatoria],
    ['Estado actual del proyecto',$all->estadoactualproyecto],
    ['Costo de finalización',$all->costofinalizacion],
    ['Fecha de finalización',$all->fechafinalizacion],
    ['Alcance a la finalización',$all->alcancefinalizacion],
    ['Razones de cambio en el proyecto',$all->razonescambioproyecto],
    ['Documentos del proyecto',$docs],
    




 


 
]);

//print_r($all);
return $export;
//die();




      
    }

    
   

}
