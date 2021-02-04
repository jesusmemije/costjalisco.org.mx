<?php

namespace App\Exports;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use stdClass;

/*
Clase que hace uso de la librería 'Matwebsite para generar archivos CSV y excel dinámicamente.
Para más información de la librería: https://docs.laravel-excel.com/
El export generado será de todos los proyectos.
*/

class AllProjectDataExport implements FromArray,ShouldAutoSize 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
      
        
         $projects = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('responsableproyecto','project.id','=','responsableproyecto.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('address', 'locations.id_address', '=', 'address.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->leftJoin('proyecto_ejecucion','project.id','=','proyecto_ejecucion.id_project')
        ->leftJoin('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
        ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')     
        ->select('project.*','project.id as id_project',
        'generaldata.responsable','generaldata.email','generaldata.organismo','generaldata.puesto','generaldata.involucrado','generaldata.puesto','generaldata.video','generaldata.observaciones as observaciones_datosgenerales',
        'address.*',
        'locations.*','locations.description as descriptionlocation',
        'responsableproyecto.nombreresponsable','responsableproyecto.cargoresponsable','responsableproyecto.telefonoresponsable','responsableproyecto.correoresponsable','responsableproyecto.domicilioresponsable','responsableproyecto.horarioresponsable',
        'proyecto_contratacion.nombreresponsable as nr','proyecto_contratacion.fechapublicacion','proyecto_contratacion.entidadadjudicacion','proyecto_contratacion.nombrecontacto','proyecto_contratacion.emailcontacto','proyecto_contratacion.telefonocontacto','proyecto_contratacion.domiciliocontacto','proyecto_contratacion.modalidadadjudicacion','proyecto_contratacion.tipocontrato','proyecto_contratacion.modalidadcontrato','proyecto_contratacion.estadoactual','proyecto_contratacion.empresasparticipantes','proyecto_contratacion.entidad_admin_contrato','proyecto_contratacion.titulocontrato','proyecto_contratacion.empresacontratada','proyecto_contratacion.viapropuesta','proyecto_contratacion.fechapresentacionpropuesta','proyecto_contratacion.montocontrato','proyecto_contratacion.alcancecontrato','proyecto_contratacion.fechainiciocontrato','proyecto_contratacion.duracionproyecto_contrato','proyecto_contratacion.observaciones as observaciones_contratacion',
        'proyecto_ejecucion.variacionespreciocontrato','proyecto_ejecucion.razonescambiopreciocontrato','proyecto_ejecucion.variacionesduracioncontrato','proyecto_ejecucion.razonescambioduracioncontrato','proyecto_ejecucion.variacionesalcancecontrato','proyecto_ejecucion.razonescambiosalcancecontrato','proyecto_ejecucion.aplicacionescalatoria','proyecto_ejecucion.estadoactualproyecto','proyecto_ejecucion.observaciones as observaciones_ejecucion',
        'proyecto_finalizacion.costofinalizacion','proyecto_finalizacion.fechafinalizacion','proyecto_finalizacion.alcancefinalizacion','proyecto_finalizacion.razonescambioproyecto','proyecto_finalizacion.referenciainforme',
        'organization.id as id_organization','organization.name as name_organization')        
        ->whereNotNull('proyecto_contratacion.montocontrato')
        ->orderBy('project.created_at', 'desc')
        ->get();

        $datos=array();
        array_push($datos,[

        ['id_project',
        'Nombre de la persona que registra el proyecto',
        'Correo electrónico (Institucional)',
        'Organismo al que pertenece',
        'Puesto que desempeña dentro del organismo',
        'En caso de haber una persona más involucrada en el registro del proyecto favor de mencionar',
        'Título del proyecto',
        'Número que identifica al proyecto',
        'Descripción',
        'Próposito',
        'Sector',
        'Subsector',
        'Tipo de proyecto',
        'Personas beneficiadas',
        'Calle',
        'Localidad',
        'Colonia',
        'Región',
        'Estado',
        'Código Postal',
        'País',
        'Descripción del lugar',
        'Nombre del responsable del proyecto',
        'Cargo',
        'Télefono',
        'Correo electrónico',
        'Domicilio',
        'Horario de oficina',
        'Estudios de Impacto Ambiental',
        'Estudios de Factibilidad',
        'Estudios de Impacto en el terreno y asentamientos',
        'Orígenes del recurso',
        'Entidad de adjudicación',
        'Nombre contacto',
        'Correo electrónico',
        'Télefono',
        'Domicilio',
        'Fecha de publicación',
        'Nombre responsable', 
        'Modalidad de la adjudicación',
        'Tipo de contrato',
        'Modalidad de de contratación',
        'Estado actual de la contratación',
        'Empresas participantes',
        'Entidad administradora del contrato',
        'Título del contrato',
        'Empresa contratada',
        'Vía por la que presenta su propuesta',
        'Fecha de presentación de su propuesta',
        'Monto del contrato',
        'Alcance del trabajo según el contrato',
        'Fecha de inicio del contrato',
        'Duración del proyecto de acuerdo con lo establecido en el contrato',
        'Variaciones en el precio del contrato',
        'Razones de cambio en el precio del contrato',
        'Variaciones en la duración del contrato',
        'Razones de cambio en la duración del contrato',
        'Variaciones en el alcance del contrato',
        'Razones de cambios en el alcance del contrato',
        'Aplicación de escalatoria',
        'Estado actual del proyecto',
        'Costo de finalización',
        'Fecha de finalización',
        'Alcance a la finalización',
        'Razones de cambio en el proyecto',
        'Documentos del proyecto',


        
        
        ],

        ]);
      

        foreach($projects as $project){
        $sector=DB::table('projectsector')
        ->where('id','=',$project->sector)
        ->first();
        $subsector=DB::table('subsector')
        ->where('id','=',$project->subsector)
        ->first();
        $type=DB::table('projecttype')
        ->where('id','=',$project->type)
        ->first();

        $auxea=DB::table('estudiosambiental')
        ->where('id_project','=',$project->id_project)
        ->get();
        
        $estudiosambiental=array();
        foreach($auxea as $aux){
            $tipoAmbiental=DB::table('catambiental')
            ->where('id','=',$aux->tipoAmbiental)
            ->select('titulo')
            ->first();

            array_push($estudiosambiental,
                
                $aux->id,
                $tipoAmbiental->titulo,
                $aux->fecharealizacionAmbiental,
                json_encode($aux->responsableAmbiental, JSON_UNESCAPED_UNICODE),
                $aux->numeros_ambiental,
        
                
                );
        }
        
        $estudiosambiental=implode("|",$estudiosambiental);
        $auxef=DB::table('estudiosfactibilidad')
        ->where('id_project','=',$project->id_project)
        ->get();
        
        $estudiosfactibilidad=array();
        foreach($auxef as $aux){
            $tipoFactibilidad=DB::table('catfac')
            ->where('id','=',$aux->tipoFactibilidad)
            ->first();

            array_push($estudiosfactibilidad,
                
                 $aux->id,
                 $tipoFactibilidad->titulo,
                 $aux->fecharealizacionFactibilidad,
                 $aux->responsableFactibilidad,
                 $aux->numeros_factibilidad,
        
                
                );
        }
        $estudiosfactibilidad=implode("|",$estudiosfactibilidad);
        $auxei=DB::table('estudiosimpacto')
        ->where('id_project','=',$project->id_project)
        ->get();
        
        $estudiosimpacto=array();
        foreach($auxei as $aux){
            $tipoImpacto=DB::table('catimpactoterreno')
            ->where('id','=',$aux->tipoImpacto)
            ->first();
            array_push($estudiosimpacto,
                
                 $aux->id,
                 $tipoImpacto->titulo,
                 $aux->fecharealizacionimpacto,
                 $aux->responsableImpacto,
                 $aux->numeros_impacto,
        
                
                );
        }
        $estudiosimpacto=implode("|",$estudiosimpacto);
  

        $auxrecurso = DB::table('project')
        ->join('project_budgetbreakdown', 'project.id', '=', 'project_budgetbreakdown.id_project')
        ->join('budget_breakdown', 'project_budgetbreakdown.id_budget', '=', 'budget_breakdown.id')
        ->join('period', 'budget_breakdown.id_period', '=', 'period.id')
        ->where('project.id', '=', $project->id_project)
        ->select(
            'budget_breakdown.description',
            'budget_breakdown.sourceParty_name',
            'period.startDate as iniciopresupuesto'
        )
        ->get();
        
        $origenesRecurso=array();
        foreach($auxrecurso as $aux){
            $tipoRecurso = DB::table('catorigenrecurso')
            ->where('id', '=', $aux->description)
            ->first();
            array_push($origenesRecurso,
                
              
                 $tipoRecurso->titulo,
                 $aux->sourceParty_name,
                 $aux->iniciopresupuesto,
        
                
                );
        }
        $origenesRecurso=implode("|",$origenesRecurso);
        $estadoactual=DB::table('contractingprocess_status')
        ->where('id','=',$project->estadoactual)
        ->first();
        if ($estadoactual == null) {
            $estadoactual = new stdClass();
            $estadoactual->titulo = "";
        }
        $modalidadadjudicacion=DB::table('catmodalidad_adjudicacion')
        ->where('id','=',$project->modalidadadjudicacion)
        ->first();
        if ($modalidadadjudicacion == null) {
            $modalidadadjudicacion = new stdClass();
            $modalidadadjudicacion->titulo = "";
        }
        $modalidadcontrato=DB::table('catmodalidad_contratacion')
        ->where('id','=',$project->modalidadcontrato)
        ->first();
        if ($modalidadcontrato == null) {
            $modalidadcontrato = new stdClass();
            $modalidadcontrato->titulo = "";
        }
        $tipocontrato=DB::table('cattipo_contrato')
        ->where('id','=',$project->tipocontrato)
        ->first();
        if ($tipocontrato == null) {
            $tipocontrato = new stdClass();
            $tipocontrato->titulo = "";
        }

        $docs=array();
        $project_documents = DB::table('project_documents')
        ->join('documents', 'project_documents.id_document', '=', 'documents.id')
        ->where('id_project', '=', $project->id)
        ->get();

        foreach($project_documents as $document){
            $aux=asset('documents/'.$document->url);
            array_push($docs,$aux);
        }
        $docs=implode('|',$docs);

        array_push($datos,[
      
        [$project->id_project,
        $project->responsable,
        $project->email,
        $project->organismo,
        $project->puesto,
        $project->involucrado,
        $project->title,
        $project->ocid,
        $project->description,
        $project->purpose,
        $sector->titulo,
        $subsector->titulo,
        $type->titulo,
        $project->people,
        $project->streetAddress,
        $project->locality,
        $project->suburb,
        $project->region,
        $project->state,
        $project->postalCode,
        $project->countryName,
        $project->descriptionlocation,
        $project->nombreresponsable,
        $project->cargoresponsable,
        $project->telefonoresponsable,
        $project->correoresponsable,
        $project->domicilioresponsable,
        $project->horarioresponsable,
        $estudiosambiental,
        $estudiosfactibilidad,
        $estudiosimpacto,
        $origenesRecurso,
        $project->entidadadjudicacion,
        $project->nombrecontacto,
        $project->emailcontacto,
        $project->telefonocontacto,
        $project->domiciliocontacto,
        $project->fechapublicacion,
        $project->nr,
        $modalidadadjudicacion->titulo,
        $tipocontrato->titulo,
        $modalidadcontrato->titulo,
        $estadoactual->titulo,
        $project->empresasparticipantes,
        $project->entidad_admin_contrato,
        $project->titulocontrato,
        $project->empresacontratada,
        $project->viapropuesta,
        $project->fechapresentacionpropuesta,
        $project->montocontrato,
        $project->alcancecontrato,
        $project->fechainiciocontrato,
        $project->duracionproyecto_contrato,
        $project->variacionespreciocontrato,
        $project->razonescambiopreciocontrato,
        $project->variacionesduracioncontrato,
        $project->razonescambioduracioncontrato,
        $project->variacionesalcancecontrato,
        $project->razonescambiosalcancecontrato,
        $project->aplicacionescalatoria,
        $project->estadoactualproyecto,
        $project->costofinalizacion,
        $project->fechafinalizacion,
        $project->alcancefinalizacion,
        $project->razonescambioproyecto,
        $docs,
        
        ]
        ]
        );
        }
        
        return $datos;
    }

   
}
