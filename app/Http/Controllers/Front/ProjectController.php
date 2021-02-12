<?php

namespace App\Http\Controllers\Front;

use App\Exports\AllProjectDataExport;
use App\Exports\ProjectDataExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;

class ProjectController extends Controller
{
    public function list_projects(Request $request)
    {

        if (empty($request->municipio)) {
            // Hacemos la consulta de los proyectos que cumplan la condición de las tres primeras secciones de la alta de proyectos y que tenga el monto contrato
            if (empty($request->presupuesto)) {
                $projects = DB::table('project')
                ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                ->whereNotNull('proyecto_contratacion.montocontrato')
                ->orderBy('project.created_at', 'desc')
                ->get();

            } else {
                // Hacemos la búsqueda con el presupuesto y que los resultados sean menor que el mismo
                $projects = DB::table('project')
                ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                ->whereNotNull('proyecto_contratacion.montocontrato')
                ->where('proyecto_contratacion.montocontrato','<=',$request->presupuesto)
                ->orderBy('project.created_at', 'desc')
                ->get();
                
            }
        } else {
            if (empty($request->id_sector)) {
                // Hacemos el la búsqueda sin el sector y preguntamos de nuevo
                if (empty($request->presupuesto)) {
                    // Si no hay un presupuesto entonces solo hacemos la busqueda con el municipio seleccionado
                    $projects = DB::table('project')
                        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                        ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                        ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                        ->join('address', 'locations.id_address', '=', 'address.id')
                        ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                        ->join('subsector', 'project.subsector', '=', 'subsector.id')
                        ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                        ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                        ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                        ->whereNotNull('proyecto_contratacion.montocontrato')
                        ->where('address.locality', '=', $request->municipio)
                        ->orderBy('project.created_at', 'desc')
                        ->get();
                } else {
                    // Hacemos la búsqueda con el municipio y el presupuesto ingresado
                    $projects = DB::table('project')
                        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                        ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                        ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                        ->join('address', 'locations.id_address', '=', 'address.id')
                        ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                        ->join('subsector', 'project.subsector', '=', 'subsector.id')
                        ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                        ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                        ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                        ->whereNotNull('proyecto_contratacion.montocontrato')
                        ->where('address.locality', '=', $request->municipio)
                        ->where('proyecto_contratacion.montocontrato', '<=', $request->presupuesto)
                        ->orderBy('project.created_at', 'desc')
                        ->get();
                }
            } else {
                if (empty($request->id_subsector)) {
                    // Hacemos la búsqueda con el municipio y el sector selecciondao
                    $projects = DB::table('project')
                        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                        ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                        ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                        ->join('address', 'locations.id_address', '=', 'address.id')
                        ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                        ->join('subsector', 'project.subsector', '=', 'subsector.id')
                        ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                        ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                        ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                        ->whereNotNull('proyecto_contratacion.montocontrato')
                        ->where('address.locality', '=', $request->municipio)
                        ->where('project.sector', '=', $request->id_sector)
                        ->orderBy('project.created_at', 'desc')
                        ->get();
                } else {
                    if (empty($request->codigo_postal)) {
                        // Hacemos la búsqueda con el municipio, el sector y el subsector seleccionado
                        $projects = DB::table('project')
                            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                            ->join('address', 'locations.id_address', '=', 'address.id')
                            ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                            ->join('subsector', 'project.subsector', '=', 'subsector.id')
                            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                            ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                            ->whereNotNull('proyecto_contratacion.montocontrato')
                            ->where('address.locality', '=', $request->municipio)
                            ->where('project.sector', '=', $request->id_sector)
                            ->where('project.subsector', '=', $request->id_subsector)
                            ->orderBy('project.created_at', 'desc')
                            ->get();
                    } else {

                        if (empty($request->presupuesto)) {
                            // Si no hay presupuesto entoces hacemos la búsqueda con el municipio, el sector, el subsector y el código postal
                            $projects = DB::table('project')
                            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                            ->join('project_locations','project.id','=','project_locations.id_project')
                            ->join('locations','project_locations.id_location','=','locations.id')
                            ->join('address', 'locations.id_address', '=', 'address.id')
                            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                            ->join('subsector', 'project.subsector', '=', 'subsector.id')
                            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                            ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                            ->whereNotNull('proyecto_contratacion.montocontrato')
                            ->where('address.locality', '=', $request->municipio)
                            ->where('project.sector', '=', $request->id_sector)
                            ->where('project.subsector', '=', $request->id_subsector)
                            ->where('address.postalCode', '=', $request->codigo_postal)
                            ->orderBy('project.created_at', 'desc')
                            ->get();
                        } else {
                            // Si hay presupuesto entonces hacemos la búsqueda con el municipio, el sector, el subsector, el codigo postal y el presupuesto
                            $projects = DB::table('project')
                            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                            ->join('project_locations','project.id','=','project_locations.id_project')
                            ->join('locations','project_locations.id_location','=','locations.id')
                            ->join('address', 'locations.id_address', '=', 'address.id')
                            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                            ->join('subsector', 'project.subsector', '=', 'subsector.id')
                            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                            ->select('project.*','organization.id as id_organization','organization.name as name_organization')
                            ->whereNotNull('proyecto_contratacion.montocontrato')
                            ->where('address.locality', '=', $request->municipio)
                            ->where('project.sector', '=', $request->id_sector)
                            ->where('project.subsector', '=', $request->id_subsector)
                            ->where('address.postalCode', '=', $request->codigo_postal)
                            ->where('proyecto_contratacion.montocontrato','<=',$request->presupuesto)
                            ->orderBy('project.created_at', 'desc')
                            ->get();
                        }
                    }
                }
            }
        }

   


        return view('front.list-projects', [
            'projects' => $projects
            
        ]);
    }

    public function card_projects()
    {
        // Consultas para la vista card-projects
        // Consultamos todos los proyectos que tienen asignado un valor en el campo de monto contrato
        $projects = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
            ->join('address', 'locations.id_address', '=', 'address.id')
            ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->select('project.*', 'projectsector.titulo as sector', 'subsector.titulo as subsector')
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('front.card-projects', [
            'projects' => $projects
        ]);
    }
    /**Función que realiza las consultas necesarias para obtener la información de un proyecto especifico
     */
    public function project_single($id)
    {
        $project = Project::find($id);
        if ($project != null) {

            $project_documents = DB::table('project_documents')
                ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                ->where('id_project', '=', $id)
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
                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                //->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                //->leftJoin('proyecto_ejecucion', 'project.id', '=', 'proyecto_ejecucion.id_project')
               // ->leftJoin('proyecto_finalizacion', 'project.id', '=', 'proyecto_finalizacion.id_project')
                ->select(
                    'project.*',
                    'generaldata.*',
                    'locations.id_address',
                    'locations.principal',
                    'locations.lat as lat',
                    'locations.lng as lng',
                    'locations.description as descriptionlocation',
                  //  'proyecto_contratacion.*',
                  //  'proyecto_ejecucion.*',
                 //   'proyecto_finalizacion.*',
                    'project.id as id_project',
                    'generaldata.observaciones as observaciones1',
                    'project.observaciones as observaciones2',
                  //  'proyecto_contratacion.observaciones as observaciones4',
                  //  'proyecto_ejecucion.observaciones as observaciones5',
                  //  'proyecto_finalizacion.observaciones as observaciones6',
                )
                ->where('project.id', '=', $id)
                ->first();

            $estudiosAmbiental = DB::table('estudiosambiental')
                ->where('id_project', '=', $id)
                ->get();
            
            $estudiosFactibilidad = DB::table('estudiosfactibilidad')
                ->where('id_project', '=', $id)
                ->get();

            $estudiosImpacto = DB::table('estudiosimpacto')
                ->where('id_project', '=', $id)
                ->get();

            $origenesRecurso = DB::table('project')
                ->join('project_budgetbreakdown', 'project.id', '=', 'project_budgetbreakdown.id_project')
                ->join('budget_breakdown', 'project_budgetbreakdown.id_budget', '=', 'budget_breakdown.id')
                ->join('period', 'budget_breakdown.id_period', '=', 'period.id')
                ->where('project.id', '=', $id)
                ->select(
                    'budget_breakdown.description',
                    'budget_breakdown.sourceParty_name',
                    'period.startDate as iniciopresupuesto'
                )
                ->get();
            
            $observacionesPreparacion=DB::table('preparacionobservacion')
            ->where('id_project',$id)
            ->first();

            $responsableproyecto = DB::table('responsableproyecto')
                ->where('id_project', $id)
                ->get();


          

            $sector = DB::table('projectsector')
                ->where('id', '=', $project->sector)
                ->first();

            $subsector = DB::table('subsector')
                ->where('id', '=', $project->subsector)
                ->select('titulo')
                ->first();

            //Del contrato
            $contratos=DB::table('proyecto_contratacion')
          //  ->leftJoin('contract_documents','proyecto_contratacion.id','=','contract_documents.id_contrato')
            ->where('proyecto_contratacion.id_project','=',$id)
            ->get();

            //Ejecución
            $ejecuciones=DB::table('proyecto_ejecucion')
              ->where('proyecto_ejecucion.id_project','=',$id)
              ->get();

            //Finalización
            $finalizaciones=DB::table('proyecto_finalizacion')
            ->where('proyecto_finalizacion.id_project','=',$id)
            ->get();
            
         


            $project_imgs = DB::table('projects_imgs')
                ->where('id_project', '=', $project->id)
                ->get();

            $address = DB::table('address')
                ->where('id', '=', $all->id_address)
                ->first();

            $address_f = ($address->streetAddress) . "," . ($address->locality) . ',' . ($address->region);

            $principal = $all->principal;
            $principal = explode("|", $principal);

            if (sizeof($principal) == 1) {
                $principal[0] = "";
                $principal[1] = "";
            }

            $autoridad_publica = DB::table('organization')
                ->where('id', '=', $all->publicAuthority_id)
                ->first();

            $projecttype = DB::table('projecttype')
                ->where('id', '=', $all->type)
                ->first();

             

            return view('front.project-single', [

                'project' => $all,
                'identificacion' => $identificacion,
                'preparacion' => $preparacion,
                'contratacion' => $contratacion,
                'ejecucion' => $ejecucion,
                'finalizacion' => $finalizacion,
                'contratos'=>$contratos,
                'ejecuciones'=>$ejecuciones,
                'finalizaciones'=>$finalizaciones,
               // 'empresasparticipantes' => $empresasparticipantes,
                'subsector' => $subsector,
                //'tipocontrato' => $tipocontrato,
                //'modalidadcontratacion' => $modalidadcontratacion,
                //'modalidadadjudicacion' => $modalidadadjudicacion,
                //'estadoactual' => $estadoactual,
                'project_documents' => $project_documents,
                'project_imgs' => $project_imgs,
                'responsableproyecto' => $responsableproyecto,
                // 'tipoAmbiental' => $tipoAmbiental,
                // 'tipoFactibilidad' => $tipoFactibilidad,
                // 'tipoImpacto' => $tipoImpacto,
                'address_f' => $address_f,
                'principal' => $principal,
                'autoridad_publica' => $autoridad_publica,
                'sector' => $sector,
                'projecttype' => $projecttype,
                'address' => $address,
                'estudiosAmbiental' => $estudiosAmbiental,
                'estudiosFactibilidad' => $estudiosFactibilidad,
                'estudiosImpacto' => $estudiosImpacto,
                'origenesRecurso' => $origenesRecurso,
                'observacionesPreparacion'=>$observacionesPreparacion,
            ]);
        } else {
            return redirect()->route('list-projects');
        }
    }
    /**Función que se llama mediante ajax en la vista 'project-single'
     * que obtiene los documentos de determinada fase y determinado proyecto.
     */
    public function getdocumentsproject()
    {
        $titulo = $_POST['titulo'];
        $id_project = $_POST['idproject'];


        $data = DB::table('project_documents')
            ->join('documents', 'project_documents.id_document', '=', 'documents.id')
            ->join('documenttype','documents.documentType','=','documenttype.id')
            ->where('id_project', '=', $id_project)
            ->where('documents.description', '=', $titulo)
            ->select('documents.url','documenttype.titulo as titulo')
            ->get();


        echo json_encode($data);
    }
    /**Exportación de datos de un proyecto especifico a excel */
    public function export($id)
    {
        $name = 'data' . $id . '.xlsx';

        $excel = Excel::download(new ProjectDataExport($id), $name);
        return $excel;
    
    }
     /**Exportación de datos de todos los proyectos a excel */
    public function exportall(){
        $name = 'alldataprojects.xlsx';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }
     /**Exportación de datos de todos los proyectos a csv */
    public function exportallcsv(){
        $name = 'alldataprojects.csv';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }

    public function jsonprojects(){
        header('Content-disposition: attachment; filename=proyectos.json');
        header('Content-type: application/json');

      
     
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
        $json_string = json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        $file = 'proyectos.json';
       $json= file_put_contents($file, $json_string);
    
       echo $json_string;
      
    }
}
