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




    $identificacion = array();
    $preparacion = array();
    $contratacion = array();
    $ejecucion = array();
    $finalizacion = array();

    foreach ($project_documents as $document) {

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
   if(!$tipoFactibilidad){
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
    $estadoactual = DB::table('contractingprocess_status')
        ->where('id', '=', $all->estadoactual)
        ->first();

    $project_imgs=DB::table('projects_imgs')
    ->where('id_project','=',$project->id)
    ->get();

    $rutas=array();

    foreach($project_imgs as $ruta){
        $aux=asset('projects_imgs/'.$ruta->imgroute);
        array_push($rutas, $aux);
    }
    $rutas=implode("|",$rutas);

  
$export=  new Collection([
    /*
    ['id_project','Nombre de la persona que registra el proyecto',
    'Correo electrónico (Institucional)','Organismo al que pertenece',
    'Puesto que desempeña dentro del organismo','En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar',
    'Imágenes de la obra','Título del proyecto','Número que identifica al proyecto','Descripción',
    'Próposito','Sector','Subsector','Tipo de proyecto','Personas beneficiadas','Calle','Localidad',
    'Región','Código Postal','País','Descripción del lugar','Nombre del responsable del proyecto',
    'Cargo','Télefono','Correo electrónico','Domicilio','Horario de oficina','Estudios de Impacto Ambiental',
    'Fecha de realización','Responsable del estudio','Número o números de identificación del estudio de impacto ambiental',
    'Estudios de Factibilidad','Fecha de realización','Responsable del estudio','Número o números de identificación del estudio de factibilidad',
    'Estudios de Impacto en el terreno y asentamientos','Fecha de realización','Responsable del estudio','Número o números de identificación del estudio de factibilidad',
    'Origen del recurso','Fondo o fuente de financiamiento y partida presupuestal','Fecha de aprobación del monto de recurso autorizado'
    ],


    
    [$all->id_project,$all->responsable,$all->email,$all->organismo,$all->puesto,$all->involucrado,$rutas,
    $all->title,$all->ocid,$all->description,$all->purpose,$sector,$subsector,$projecttype,$people,
    $address->streetAddress,$address->locality,$address->region,$address->postalCode,$address->countryName,
    $all->descriptionlocation,$responsableproyecto->nombreresponsable,$responsableproyecto->cargoresponsable,
    $responsableproyecto->telefonoresponsable,$responsableproyecto->correoresponsable,$responsableproyecto->domicilioresponsable,
    $responsableproyecto->horarioresponsable,$tipoAmbiental->titulo,$all->fecharealizacionAmbiental,$all->responsableAmbiental,
    $all->numeros_ambiental,$tipoFactibilidad->titulo,$all->fecharealizacionFactibilidad,$all->responsableFactibilidad,
    $all->numeros_factibilidad,$tipoImpacto->titulo,$all->fecharealizacionimpacto,$all->responsableImpacto,
    $all->numeros_impacto,$catorigenrecurso->titulo,$origenrecurso->sourceParty_name,$origenrecurso->startDate
        
    ],
    */
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
 


 
]);

//print_r($all);
return $export;
//die();




      
    }

    
   

}
