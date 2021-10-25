<?php

namespace App\Http\Controllers\Front;

use Illuminate\Database\Eloquent\Collection;
use App\Exports\AllProjectDataExport;
use App\Exports\ProjectDataExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use DateTime;
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
                    ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                    ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('subsector', 'project.subsector', '=', 'subsector.id')
                    ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                    ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                    ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
                    ->whereNotNull('proyecto_contratacion.montocontrato')
                    ->orderBy('project.id', 'asc')
                    ->get();
            } else {
                // Hacemos la búsqueda con el presupuesto y que los resultados sean menor que el mismo
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
                    ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
                    ->whereNotNull('proyecto_contratacion.montocontrato')
                    ->where('proyecto_contratacion.montocontrato', '<=', $request->presupuesto)
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
                        ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
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
                        ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
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
                        ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
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
                            ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
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
                                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                                ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
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
                                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                                ->select('project.*', 'organization.id as id_organization', 'organization.name as name_organization')
                                ->whereNotNull('proyecto_contratacion.montocontrato')
                                ->where('address.locality', '=', $request->municipio)
                                ->where('project.sector', '=', $request->id_sector)
                                ->where('project.subsector', '=', $request->id_subsector)
                                ->where('address.postalCode', '=', $request->codigo_postal)
                                ->where('proyecto_contratacion.montocontrato', '<=', $request->presupuesto)
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

            $observacionesPreparacion = DB::table('preparacionobservacion')
                ->where('id_project', $id)
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
            $contratos = DB::table('proyecto_contratacion')
                //  ->leftJoin('contract_documents','proyecto_contratacion.id','=','contract_documents.id_contrato')
                ->where('proyecto_contratacion.id_project', '=', $id)
                ->get();

            //Ejecución
            $ejecuciones = DB::table('proyecto_ejecucion')
                ->where('proyecto_ejecucion.id_project', '=', $id)
                ->get();

            //Finalización
            $finalizaciones = DB::table('proyecto_finalizacion')
                ->where('proyecto_finalizacion.id_project', '=', $id)
                ->orderBy('fechafinalizacion', 'DESC')
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
                'contratos' => $contratos,
                'ejecuciones' => $ejecuciones,
                'finalizaciones' => $finalizaciones,
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
                'observacionesPreparacion' => $observacionesPreparacion,
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
            ->join('documenttype', 'documents.documentType', '=', 'documenttype.id')
            ->where('id_project', '=', $id_project)
            ->where('documents.description', '=', $titulo)
            ->select('documents.url', 'documenttype.titulo as titulo')
            ->get();


        echo json_encode($data);
    }
    /**Exportación de datos de un proyecto especifico a excel */
    public function export($id, $tipo)
    {

        if ($tipo == "csv") {
            $name = 'data' . $id . '.csv';

            $excel = Excel::download(new ProjectDataExport($id), $name);
            return $excel;
        }
        if ($tipo == "xlsx") {
            $name = 'data' . $id . '.xlsx';

            $excel = Excel::download(new ProjectDataExport($id), $name);
            return $excel;
        }
    }

    public function jsonproject($id)
    {
        $project = Project::find($id);

        $project_documents = DB::table('project_documents')
            ->join('documents', 'project_documents.id_document', '=', 'documents.id')
            ->where('id_project', '=', $id)
            ->get();



        $docs = array();
        $identificacion = array();
        $preparacion = array();
        $contratacion = array();
        $ejecucion = array();
        $finalizacion = array();

        foreach ($project_documents as $document) {
            $aux = asset('documents/' . $document->url);
            array_push($docs, $aux);
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
        $docs = implode('|', $docs);

        $all = DB::table('project')

            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
            ->join('address', 'locations.id_address', '=', 'address.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
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
                'locations.id_address as myaddress',
                'locations.description as descriptionlocation',
                'locations.id as locationid',
                'address.*',
                'organization.name as name_organization',
                'estudiosambiental.*',
                'estudiosfactibilidad.*',
                'estudiosimpacto.*',
                'proyecto_contratacion.*',
                'proyecto_ejecucion.*',
                'proyecto_ejecucion.*',
                'proyecto_finalizacion.*',
                'project.id as id_project'
            )
            ->where('project.id', '=', $id)
            ->first();


        $status = DB::table('projectstatus')
            ->where('id', '=', $all->status)
            ->first();
        $principal = $all->principal;
        $principal = explode("|", $principal);

        if (sizeof($principal) == 1) {
            $principal[0] = "";
            $principal[1] = "";
        }

        $responsableproyecto = DB::table('responsableproyecto')
            ->where('id_project', $id)
            ->first();

        $auxea = DB::table('estudiosambiental')
            ->where('id_project', '=', $id)
            ->get();



        $estudiosambiental = array();
        foreach ($auxea as $aux) {
            $tipoAmbiental = DB::table('catambiental')
                ->where('id', '=', $aux->tipoAmbiental)
                ->select('titulo')
                ->first();

            array_push(
                $estudiosambiental,

                $aux->id,
                $tipoAmbiental->titulo,
                $aux->fecharealizacionAmbiental,
                json_encode($aux->responsableAmbiental, JSON_UNESCAPED_UNICODE),
                $aux->numeros_ambiental,


            );
        }
        $estudiosambiental = implode("|", $estudiosambiental);

        $auxef = DB::table('estudiosfactibilidad')
            ->where('id_project', '=', $id)
            ->get();
        $estudiosfactibilidad = array();
        foreach ($auxef as $aux) {
            $tipoFactibilidad = DB::table('catfac')
                ->where('id', '=', $aux->tipoFactibilidad)
                ->first();

            array_push(
                $estudiosfactibilidad,

                $aux->id,
                $tipoFactibilidad->titulo,
                $aux->fecharealizacionFactibilidad,
                $aux->responsableFactibilidad,
                $aux->numeros_factibilidad,


            );
        }
        $estudiosfactibilidad = implode("|", $estudiosfactibilidad);
        $auxei = DB::table('estudiosimpacto')
            ->where('id_project', '=', $id)
            ->get();

        $estudiosimpacto = array();
        foreach ($auxei as $aux) {
            $tipoImpacto = DB::table('catimpactoterreno')
                ->where('id', '=', $aux->tipoImpacto)
                ->first();
            array_push(
                $estudiosimpacto,

                $aux->id,
                $tipoImpacto->titulo,
                $aux->fecharealizacionimpacto,
                $aux->responsableImpacto,
                $aux->numeros_impacto,


            );
        }
        $estudiosimpacto = implode("|", $estudiosimpacto);


        $auxrecurso = DB::table('project')
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


        $origenesRecurso = array();
        foreach ($auxrecurso as $aux) {
            $tipoRecurso = DB::table('catorigenrecurso')
                ->where('id', '=', $aux->description)
                ->first();

            $amount_array = array(["amount" => "", "currency" => "MXN"]);

            $amount_array = array_map('array_filter', $amount_array);
            $amount_array = array_filter($amount_array);

            $iniciopresupuesto = new DateTime(date($aux->iniciopresupuesto));

            $iniciopresupuesto = $iniciopresupuesto->format(DateTime::ATOM);

            array_push(
                $origenesRecurso,

                [
                    "amount" => $amount_array,
                    "requestDate" => "",

                    "aprovalDate" => $iniciopresupuesto,
                    "budgetBreakdown" => [],
                ],
            );
        }
        $array = array_map('array_filter', $origenesRecurso);
        $origenesRecurso = array_filter($array);
        //$origenesRecurso=implode("|",$origenesRecurso);

        $tipoAmbiental = DB::table('catambiental')
            ->where('id', '=', $all->tipoAmbiental)
            ->select('titulo')
            ->first();

        if (!$tipoAmbiental) {
            $tipoAmbiental = new stdClass();
            $tipoAmbiental->titulo = "";
        }


        $tipoFactibilidad = DB::table('catfac')
            ->where('id', '=', $all->tipoFactibilidad)
            ->select('titulo')
            ->first();
        if ($tipoFactibilidad == null) {
            $tipoFactibilidad = new stdClass();
            $tipoFactibilidad->titulo = "";
        }

        $tipoImpacto = DB::table('catimpactoterreno')
            ->where('id', '=', $all->tipoImpacto)
            ->select('titulo')
            ->first();

        if (!$tipoImpacto) {
            $tipoImpacto = new stdClass();
            $tipoImpacto->titulo = "";
        }

        $origenrecurso = DB::table('project_budgetbreakdown')
            ->join('budget_breakdown', 'project_budgetbreakdown.id_budget', '=', 'budget_breakdown.id')
            ->join('period', 'budget_breakdown.id_period', '=', 'period.id')
            ->where('id_project', $id)
            ->first();

        if ($origenrecurso != null) {

            $catorigenrecurso = DB::table('catorigenrecurso')
                ->where('id', '=', $origenrecurso->description)
                ->first();
        } else {

            $origenrecurso = new stdClass();
            $origenrecurso->sourceParty_name = "";
            $origenrecurso->origenrecurso = "";
            $origenrecurso->startDate = "";
            $catorigenrecurso = new stdClass();
            $catorigenrecurso->titulo = "";
        }


        $empresas = $all->empresasparticipantes;
        $empresasparticipantes = explode(",", $empresas);

        $sector = DB::table('projectsector')
            ->where('id', '=', $project->sector)
            ->select('titulo')
            ->first();
        $sector = $sector->titulo;

        $subsector = DB::table('subsector')
            ->where('id', '=', $project->subsector)
            ->select('titulo')
            ->first();
        $subsector = $subsector->titulo;

        $projecttype = DB::table('projecttype')
            ->where('id', '=', $project->type)
            ->select('titulo')
            ->first();
        $projecttype = $projecttype->titulo;

        $address = DB::table('address')
            ->where('id', '=', $all->myaddress)
            ->first();




        $people = $project->people;









        //validate null 
        $tipocontrato = DB::table('cattipo_contrato')
            ->where('id', '=', $all->tipocontrato)
            ->first();
        if ($tipocontrato == null) {
            $tipocontrato = new stdClass();
            $tipocontrato->titulo = "";
        }

        //Contratación.


        //contratos

        $aux_contrato = DB::table('proyecto_contratacion')
            ->where('id_project', '=', $all->id_project)
            ->get();

        $contratos = array();
        foreach ($aux_contrato as $aux) {


            $estadoactual = DB::table('contractingprocess_status')
                ->where('id', '=', $aux->estadoactual)
                ->first();
            if ($estadoactual == null) {
                $estadoactual = new stdClass();
                $estadoactual->titulo = "";
            }
            $modalidadadjudicacion = DB::table('catmodalidad_adjudicacion')
                ->where('id', '=', $aux->modalidadadjudicacion)
                ->first();
            if ($modalidadadjudicacion == null) {
                $modalidadadjudicacion = new stdClass();
                $modalidadadjudicacion->titulo = "";
            }
            $modalidadcontrato = DB::table('catmodalidad_contratacion')
                ->where('id', '=', $aux->modalidadcontrato)
                ->first();
            if ($modalidadcontrato == null) {
                $modalidadcontrato = new stdClass();
                $modalidadcontrato->titulo = "";
            }
            $tipocontrato = DB::table('cattipo_contrato')
                ->where('id', '=', $aux->tipocontrato)
                ->first();
            if ($tipocontrato == null) {
                $tipocontrato = new stdClass();
                $tipocontrato->titulo = "";
            }


            $fechapublicacion = new DateTime(date($aux->fechapublicacion));

            $fechapublicacion = $fechapublicacion->format(DateTime::ATOM);

            $fechainiciocontrato = new DateTime(date($aux->fechainiciocontrato));

            $fechainiciocontrato = $fechainiciocontrato->format(DateTime::ATOM);
            $contractperiod_array = array([
                "startDate" => $fechapublicacion,
                "endDate" => $fechainiciocontrato,
                "maxExtentDate" => "",
                "durationInDays" => $aux->duracionproyecto_contrato
            ]);

            $contractvalue_array = array(["amount" => $aux->montocontrato, "currency" => "MXN"]);

            $finalvalue_array = array(["amount" => $aux->montocontrato, "currency" => "MXN"]);

            $contractperiod_array = array_map('array_filter', $contractperiod_array);
            $contractperiod_array = array_filter($contractperiod_array);

            $contractvalue_array = array_map('array_filter', $contractvalue_array);
            $contractvalue_array = array_filter($contractvalue_array);

            $finalvalue_array = array_map('array_filter', $finalvalue_array);
            $finalvalue_array = array_filter($finalvalue_array);




            //aux_duration_contratio its a string must be convert to int.
            array_push(
                $contratos,
                [
                    "ocid" => "",
                    "externalReference" => "",
                    "nature" => $tipocontrato->titulo,
                    "title" => $aux->titulocontrato,
                    "description" => "",
                    "status" => $estadoactual->titulo,
                    "tender" => "",
                    "suppliers" => "",
                    "contractValue" => $contractvalue_array,
                    "contractPeriod" => $contractperiod_array,
                    "finalValue" => $finalvalue_array,
                    "documents" => "",
                    "modifications" => "",
                    "observaciones" => $aux->observaciones,

                ]
            );
        }

        

        $array = array_map('array_filter', $contratos);
        $contratos = array_filter($array);


        //Fase de finalización.


        $aux_finalizacion = DB::table('proyecto_finalizacion')
            ->where('id_project', '=', $project->id)
            ->get();

        $valorfinalproyecto = 0;
        $finalizaciones = array();
        foreach ($aux_finalizacion as $aux) {

            $aux_array = array(["amount" => $aux->costofinalizacion, "currency" => "MXN"]);

            $valorfinalproyecto = $valorfinalproyecto + $aux->costofinalizacion;

            $aux_filter = array_map('array_filter', $aux_array);

            $aux_filter = array_filter($aux_filter);

            $fechafinalizacion = new DateTime(date($aux->fechafinalizacion));

            $fechafinalizacion = $fechafinalizacion->format(DateTime::ATOM);
            array_push(
                $finalizaciones,
                // $aux->id,
                // $aux->id_contrato,
                [
                    "endDate" => $fechafinalizacion,
                    "endDateDetails" => $aux->razonescambioproyecto,

                    "finalValue" => $aux_filter,
                    "finalScope" => $aux->alcancefinalizacion,
                    "finalScopeDetails" => $aux->referenciainforme,
                    "observaciones" => $aux->observaciones


                ]
            );
        }
        $array = array_map('array_filter', $finalizaciones);
        $finalizaciones = array_filter($array);

        $lastfin=
                DB::table('proyecto_finalizacion as  pf')
                
                ->where('pf.id_project','=',$project->id)
                ->where('pf.fechafinalizacion','=',DB::raw("(select max(fechafinalizacion) from proyecto_finalizacion where proyecto_finalizacion.id_project={$project->id})"))
                ->first();

     
            
         //   $lastfin= !empty($lastfin) ? 
         //   (object) array_filter((array) $lastfin) : null;

            if(!empty($lastfin)){

             

                $aux_array = array(["amount" => $lastfin->costofinalizacion, "currency" => "MXN"]);

                $aux_filter = array_map('array_filter', $aux_array);

                $aux_filter = array_filter($aux_filter);

                $fechafinalizacion = new DateTime(date($lastfin->fechafinalizacion));

                $fechafinalizacion = $fechafinalizacion->format(DateTime::ATOM);


              
                $finobject=new stdClass();

                $finobject->endDate = $fechafinalizacion;
                $finobject->endDateDetails= $lastfin->razonescambioproyecto;

                $finobject->finalValue = $aux_filter;
                $finobject->finalScope = $lastfin->alcancefinalizacion;
                $finobject->finalScopeDetails = $lastfin->referenciainforme;
           //   $finobject->observaciones = $lastfin->observaciones;
           $finobject=(object) array_filter((array) $finobject);

            }else{
                $lastfin=null;
                $finobject=null;
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


        $project_imgs = DB::table('projects_imgs')
            ->where('id_project', '=', $project->id)
            ->get();

        /***Rutas para las imagenes del proyecto */
        $rutas = array();

        foreach ($project_imgs as $ruta) {
            $aux = asset('projects_imgs/' . $ruta->imgroute);
            array_push($rutas, $aux);
        }
        $rutas = implode("|", $rutas);


        //documentos


        $docs = array();
        $project_documents = DB::table('project_documents')
            ->join('documents', 'project_documents.id_document', '=', 'documents.id')
            ->where('id_project', '=', $project->id)
            ->get();

        foreach ($project_documents as $document) {

            $documentType = DB::table('documents')
                ->join('documenttype', 'documents.documentType', '=', 'documenttype.id')
                ->first();


            $created_at = new DateTime(date($document->created_at));

            $created_at = $created_at->format(DateTime::ATOM);

            $updated_at = new DateTime(date($document->updated_at));

            $updated_at = $updated_at->format(DateTime::ATOM);


            $aux = asset('documents/' . $document->url);
            array_push(
                $docs,
                [
                    "id" => $document->id,
                    "documentType" => $documentType->titulo,
                    "url" => $aux,
                    "datePublished" => $created_at,
                    "dateModified" => $updated_at,
                ]
            );
        }


        $array = array_map('array_filter', $docs);
        $docs = array_filter($array);
        $updated = new DateTime(date($project->updated));

        $updated = $updated->format(DateTime::ATOM);


        $objDateTime = new DateTime('NOW');
        $lafecha = $objDateTime->format('c'); // ISO8601 formated datetime


        $export =  new Collection(
            [

                "uri" => "http://costjalisco.org.mx/project-single/" . $id,
                "publishedDate" => $updated,
                "version" => "1.0",
                "publisher" => [
                    "name" => "CoST Jalisco"
                ],
                "license" => "https://creativecommons.org/licenses/by/4.0/legalcode",
                "projects" =>

                [
                    "id" => $project->ocid,
                    "updated" => $updated,
                    "title" => $project->title,
                    "description" => $project->description,
                    "status" => $status->titulo,
                    // "period"=>["startDate"=>"","endDate"=>"","durationInDays"=>""],
                    "sector" => [$sector . "." . $subsector],
                    "purpose" => $project->purpose,

                    "type" => $projecttype,


                    "locations" =>
                    [
                        [


                            "id" => $all->locationid,
                            "description" => $all->descriptionlocation,
                            "geometry" => ["type" => "Point", "coordinates" => [$principal[0], $principal[1]]],

                        ],
                        [
                            "address" => [

                                "streetAddress" => $all->streetAddress,
                                "locality" => $all->locality,
                                "region" => $all->region,
                                "postalCode" => $all->postalCode,
                                "countryName" => $all->countryName,
                            ]
                        ]
                    ],
                    "budget" => $origenesRecurso,
                    "parties" => [],
                    "publicAuthority" => ["name" => $all->name_organization, "id" => $project->publicAuthority_id],
                    "documents" => $docs,
                    "contractingProcess" =>
                    [
                      
                        "summary" => $contratos,


                    ],
                    "completion" => $finobject

                ]


            ]
        );





        $file = "proyecto" . $id . ".json";

        header('Content-disposition: attachment; filename=' . $file);
        header('Content-type: application/json');

        $json_string = json_encode($export, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

        //$file = 'proyecto.json';
        // $json= file_put_contents($file, $json_string);

        echo $json_string;
    }

    /**Exportación de datos de todos los proyectos a excel */
    public function exportall()
    {
        $name = 'projects.xlsx';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }
    /**Exportación de datos de todos los proyectos a csv */
    public function exportallcsv()
    {
        $name = 'projects.csv';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }

    public function jsonprojects()
    {   


       
       
        $entities=array('Á','É','Í','Ó','Ú','á','é','í','ó','ú','ü');
        $replacements=array('%C1','%C9','%CD','%D3','%DA','%E1','%E9','%ED','%F3','%FA');
        

        $projects = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('responsableproyecto', 'project.id', '=', 'responsableproyecto.id_project')
            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
            ->join('address', 'locations.id_address', '=', 'address.id')
            ->join('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
            //->leftJoin('proyecto_ejecucion','project.id','=','proyecto_ejecucion.id_project')
            //->leftJoin('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(
                'project.*',
                'project.id as id_project',
                'generaldata.responsable',
                'generaldata.email',
                'generaldata.organismo',
                'generaldata.puesto',
                'generaldata.involucrado',
                'generaldata.puesto',
                'generaldata.video',
                'generaldata.observaciones as observaciones_datosgenerales',
                'address.*',
                'locations.*',
                'locations.id as locationid',
                'locations.description as descriptionlocation',
                'responsableproyecto.nombreresponsable',
                'responsableproyecto.cargoresponsable',
                'responsableproyecto.telefonoresponsable',
                'responsableproyecto.correoresponsable',
                'responsableproyecto.domicilioresponsable',
                'responsableproyecto.horarioresponsable',
                // 'proyecto_contratacion.nombreresponsable as nr','proyecto_contratacion.fechapublicacion','proyecto_contratacion.entidadadjudicacion','proyecto_contratacion.nombrecontacto','proyecto_contratacion.emailcontacto','proyecto_contratacion.telefonocontacto','proyecto_contratacion.domiciliocontacto','proyecto_contratacion.modalidadadjudicacion','proyecto_contratacion.tipocontrato','proyecto_contratacion.modalidadcontrato','proyecto_contratacion.estadoactual','proyecto_contratacion.empresasparticipantes','proyecto_contratacion.entidad_admin_contrato','proyecto_contratacion.titulocontrato','proyecto_contratacion.empresacontratada','proyecto_contratacion.viapropuesta','proyecto_contratacion.fechapresentacionpropuesta','proyecto_contratacion.montocontrato','proyecto_contratacion.alcancecontrato','proyecto_contratacion.fechainiciocontrato','proyecto_contratacion.duracionproyecto_contrato','proyecto_contratacion.observaciones as observaciones_contratacion',
                // 'proyecto_ejecucion.variacionespreciocontrato','proyecto_ejecucion.razonescambiopreciocontrato','proyecto_ejecucion.variacionesduracioncontrato','proyecto_ejecucion.razonescambioduracioncontrato','proyecto_ejecucion.variacionesalcancecontrato','proyecto_ejecucion.razonescambiosalcancecontrato','proyecto_ejecucion.aplicacionescalatoria','proyecto_ejecucion.estadoactualproyecto','proyecto_ejecucion.observaciones as observaciones_ejecucion',
                // 'proyecto_finalizacion.costofinalizacion','proyecto_finalizacion.fechafinalizacion','proyecto_finalizacion.alcancefinalizacion','proyecto_finalizacion.razonescambioproyecto','proyecto_finalizacion.referenciainforme',
                'organization.id as id_organization',
                'organization.name as name_organization'
            )
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->orderBy('project.created_at', 'desc')
            ->get();



        $datos = array();
        
        $proyecto = 0;
        foreach ($projects as $project) {

            if ($proyecto != $project->id_project) {

                $status = DB::table('projectstatus')
                    ->where('id', '=', $project->status)
                    ->first();

                $principal = $project->principal;
                $principal = explode("|", $principal);

                if (sizeof($principal) == 1) {
                    $principal[0] = "";
                    $principal[1] = "";
                }


                $sector = DB::table('projectsector')
                    ->where('id', '=', $project->sector)
                    ->first();
                $subsector = DB::table('subsector')
                    ->where('id', '=', $project->subsector)
                    ->first();
                $type = DB::table('projecttype')
                    ->where('id', '=', $project->type)
                    ->first();

                $auxea = DB::table('estudiosambiental')
                    ->where('id_project', '=', $project->id_project)
                    ->get();

                $estudiosambiental = array();
                foreach ($auxea as $aux) {
                    $tipoAmbiental = DB::table('catambiental')
                        ->where('id', '=', $aux->tipoAmbiental)
                        ->select('titulo')
                        ->first();

                  

                    array_push(
                        $estudiosambiental,

                        $aux->id,
                        $tipoAmbiental->titulo,
                        $aux->fecharealizacionAmbiental,
                        json_encode($aux->responsableAmbiental, JSON_UNESCAPED_UNICODE),
                        $aux->numeros_ambiental,


                    );
                }

                $estudiosambiental = implode("|", $estudiosambiental);
                $auxef = DB::table('estudiosfactibilidad')
                    ->where('id_project', '=', $project->id_project)
                    ->get();

                $estudiosfactibilidad = array();
                foreach ($auxef as $aux) {
                    $tipoFactibilidad = DB::table('catfac')
                        ->where('id', '=', $aux->tipoFactibilidad)
                        ->first();

                    array_push(
                        $estudiosfactibilidad,

                        $aux->id,
                        $tipoFactibilidad->titulo,
                        $aux->fecharealizacionFactibilidad,
                        $aux->responsableFactibilidad,
                        $aux->numeros_factibilidad,


                    );
                }
                $estudiosfactibilidad = implode("|", $estudiosfactibilidad);
                $auxei = DB::table('estudiosimpacto')
                    ->where('id_project', '=', $project->id_project)
                    ->get();

                $estudiosimpacto = array();
                foreach ($auxei as $aux) {
                    $tipoImpacto = DB::table('catimpactoterreno')
                        ->where('id', '=', $aux->tipoImpacto)
                        ->first();
                    array_push(
                        $estudiosimpacto,

                        $aux->id,
                        $tipoImpacto->titulo,
                        $aux->fecharealizacionimpacto,
                        $aux->responsableImpacto,
                        $aux->numeros_impacto,


                    );
                }
                $estudiosimpacto = implode("|", $estudiosimpacto);


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

                $origenesRecurso = array();
                $iniciopresupuesto="";
                foreach ($auxrecurso as $aux) {
                    $tipoRecurso = DB::table('catorigenrecurso')
                        ->where('id', '=', $aux->description)
                        ->first();

                    $amount_array=new stdClass();
                    //$amount_array->amount="";
                    $amount_array->currency="MXN";
                    //$amount_array = array(["amount" => "", "currency" => "MXN"]);

                    //$amount_array = array_map('array_filter', $amount_array);
                    //$amount_array = array_filter($amount_array);

                    $iniciopresupuesto = new DateTime(date($aux->iniciopresupuesto));

                    $iniciopresupuesto = $iniciopresupuesto->format(DateTime::ATOM);

                    array_push(
                        $origenesRecurso,

                        [
                            "amount" => $amount_array,
                            "requestDate" => "",

                            "aprovalDate" => $iniciopresupuesto,
                            "budgetBreakdown" => [],
                        ],
                    );
                }

                $array = array_map('array_filter', $origenesRecurso);
                $origenesRecurso = array_filter($array);

                // $origenesRecurso=implode("|",$origenesRecurso);

                //Contratación



                $aux_contrato = DB::table('proyecto_contratacion')
                    ->where('id_project', '=', $project->id_project)
                    ->get();

                $contratos = array();
                $amout_tc=0;
                $fechafinalizacion=0;
                $fechainiciocontrato="";

                foreach ($aux_contrato as $aux) {


                    $estadoactual = DB::table('contractingprocess_status')
                        ->where('id', '=', $aux->estadoactual)
                        ->first();
                    if ($estadoactual == null) {
                        $estadoactual = new stdClass();
                        $estadoactual->titulo = "";
                    }
                    $modalidadadjudicacion = DB::table('catmodalidad_adjudicacion')
                        ->where('id', '=', $aux->modalidadadjudicacion)
                        ->first();
                    if ($modalidadadjudicacion == null) {
                        $modalidadadjudicacion = new stdClass();
                        $modalidadadjudicacion->titulo = "";
                    }
                    $modalidadcontrato = DB::table('catmodalidad_contratacion')
                        ->where('id', '=', $aux->modalidadcontrato)
                        ->first();
                    if ($modalidadcontrato == null) {
                        $modalidadcontrato = new stdClass();
                        $modalidadcontrato->titulo = "";
                    }
                    $tipocontrato = DB::table('cattipo_contrato')
                        ->where('id', '=', $aux->tipocontrato)
                        ->first();
                    if ($tipocontrato == null) {
                        $tipocontrato = new stdClass();
                        $tipocontrato->titulo = "";
                    }
                    //aux_duration_contratio its a string must be convert to int.

                    $fechapublicacion = new DateTime(date($aux->fechapublicacion));

                    $fechapublicacion = $fechapublicacion->format(DateTime::ATOM);

                    $fechainiciocontrato = new DateTime(date($aux->fechainiciocontrato));

                    $fechainiciocontrato = $fechainiciocontrato->format(DateTime::ATOM);
                    $contractperiod_array = array([
                        "startDate" => $fechapublicacion,
                        "endDate" => $fechainiciocontrato,
                        "maxExtentDate" => "",
                        "durationInDays" => (int) $aux->duracionproyecto_contrato
                    ]);
                    
                    $amout_tc=$amout_tc+$aux->montocontrato;

                    $contractvalue_array = array(["amount" => $aux->montocontrato, "currency" => "MXN"]);

                    $finalvalue_array = array(["amount" => $aux->montocontrato, "currency" => "MXN"]);

                    $contractperiod_array = array_map('array_filter', $contractperiod_array);
                    $contractperiod_array = array_filter($contractperiod_array);

                    $contractvalue_array = array_map('array_filter', $contractvalue_array);
                    $contractvalue_array = array_filter($contractvalue_array);

                    $finalvalue_array = array_map('array_filter', $finalvalue_array);
                    $finalvalue_array = array_filter($finalvalue_array);

                    $address=DB::table('proyecto_contratacion')
                    ->select('streetAddress','locality','region','postalCode','countryName')
                    ->join('address','proyecto_contratacion.id_address','=','address.id')
                    ->where('id_project','=',$project->id_project)
                    ->first();

                    //Para verificar que no contenga datos nulos o vaciós el clase.
                    $address=(object) array_filter((array) $address);

                    $contactPoint=new stdClass();
                    $contactPoint->name=$aux->nombrecontacto;
                    $contactPoint->email=$aux->emailcontacto;
                    $contactPoint->telephone=$aux->telefonocontacto;

                    //Para verificar que no contenga datos nulos o vaciós el clase.
                    $contactPoint=(object) array_filter((array) $contactPoint);
                    $parties= array();

                    array_push($parties,
                    [
                        'name'=>$aux->entidadadjudicacion.'-'. $project->id_project,
                        'id'=> (string) $aux->id_organization,
                        'address'=>$address,
                        'contactPoint'=>$contactPoint,
                        'roles'=>['supplier']
                    
                    ]);
                    //Para verificar que no contenga datos nulos o vaciós el array.

                    $parties = array_map('array_filter', $parties);
                    $parties = array_filter($parties);

                    $suppliers=array();

                    array_push($suppliers,[
                        'name'=>$aux->entidadadjudicacion.'-'. $project->id_project,
                        'id'=> (string) $aux->id_organization
                        ],);

                        $contract_value=(object) array_filter((array) $address);

                        $contract_value=new stdClass();
                        $contract_value->amount=(int)$aux->montocontrato;
                        $contract_value->currency="MXN";

                        $contract_value=(object) array_filter((array) $contract_value);

                        $contract_period=new stdClass();
                        
                        $contract_period->startDate=$fechapublicacion;
                        $contract_period->endDate=$fechainiciocontrato;
                        $auxduracion=(int)$aux->duracionproyecto_contrato;
                        $contract_period->durationInDays=$auxduracion;

                        $contract_period=(object) array_filter((array) $contract_period);



                        $final_value=new stdClass();
                        $final_value->amount=(int)$aux->montocontrato;
                        $final_value->currency="MXN";

                        $final_value=(object) array_filter((array) $final_value);
                        
                        
                        $contratos=new stdClass();
                        $contratos->nature= [$tipocontrato->estandar];
                        $contratos->title=  $aux->titulocontrato;
                        $contratos->status=  $estadoactual->codigo;
                        $contratos->suppliers= $suppliers;
                        $contratos->contractValue= $contract_value;
                        $contratos->contractPeriod= $contract_period;
                        $contratos->finalValue= $final_value;
                        $contratos=(object) array_filter((array) $contratos);
                        /*
                    array_push(
                        $contratos,
                        [
                            "ocid" => "",
                            "externalReference" => "",
                            "nature" => [$tipocontrato->estandar],
                            "title" => $aux->titulocontrato,
                            "description" => "",
                            "status" => $estadoactual->titulo,
                            "tender" => "",
                            "suppliers" => $suppliers,
                            "contractValue" => $contract_value,
                            "contractPeriod" => $contract_period,
                            "finalValue" => $final_value,
                            "documents" => "",
                            "modifications" => "",
                            //"observaciones" => $aux->observaciones,

                        ]
                    );
                    */
                }

                // $contratos=json_encode($contratos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

               // $array = array_map('array_filter', $contratos);
               // $contratos = array_filter($array);

                //Fase  de ejecución.
                $aux_ejecucion = DB::table('proyecto_ejecucion')
                    ->where('id_project', '=', $project->id_project)
                    ->get();
               
                $ejecuciones = array();
                foreach ($aux_ejecucion as $aux) {
                    array_push(
                        $ejecuciones,
                        $aux->id,
                        $aux->id_contrato,
                        $aux->variacionespreciocontrato,
                        $aux->razonescambiopreciocontrato,
                        $aux->variacionesduracioncontrato,
                        $aux->razonescambioduracioncontrato,
                        $aux->variacionesalcancecontrato,
                        $aux->razonescambiosalcancecontrato,
                        $aux->aplicacionescalatoria,
                        $aux->estadoactualproyecto,
                        $aux->observaciones
                    );
                }

                $ejecuciones = implode("|", $ejecuciones);

                //Fase de finalización.


                $aux_finalizacion = DB::table('proyecto_finalizacion')
                    ->where('id_project','=',$project->id_project)
                    ->get();
                $test = 0;
                $amount_ff=0;
                $finalizaciones = array();
                foreach ($aux_finalizacion as $aux) {

                    $amount_ff= $amount_ff+ $aux->costofinalizacion;
                    
                    $aux_array = array(["amount" => $aux->costofinalizacion, "currency" => "MXN"]);

                    $aux_filter = array_map('array_filter', $aux_array);

                    $aux_filter = array_filter($aux_filter);

                    $fechafinalizacion = new DateTime(date($aux->fechafinalizacion));

                    $fechafinalizacion = $fechafinalizacion->format(DateTime::ATOM);

                    array_push(
                        $finalizaciones,
                        // $aux->id,
                        // $aux->id_contrato,
                        [
                            "endDate" => $fechafinalizacion,
                            "endDateDetails" => $aux->razonescambioproyecto,

                            "finalValue" => $aux_filter,
                            "finalScope" => $aux->alcancefinalizacion,
                            "finalScopeDetails" => $aux->referenciainforme,
                           // "observaciones" => $aux->observaciones


                        ]
                    );
                   
                }

                
                //presupuesto asignado al proyecto.
                $budgetobj=new stdClass();

              
                
                if($amount_ff==0 || $amount_ff==null || empty($amount_ff)){
                    $amount_ff=$amout_tc;
                    
                }

                if($fechafinalizacion==0 || $fechafinalizacion==null || empty($fechafinalizacion)){

                    if($iniciopresupuesto!=""){
                        $fechafinalizacion=$iniciopresupuesto;
                    }else{
                        $fechafinalizacion=$fechainiciocontrato;
                  
                    
                }
            }

               

                $amount=new stdClass();
                    $amount->amount=(int) $amount_ff;
                    $amount->currency="MXN";
                    
                    $amount=(object) array_filter((array) $amount);


                $budgetobj->amount=$amount;
                $budgetobj->approvalDate=$fechafinalizacion;

                $budgetobj=(object) array_filter((array) $budgetobj);


            

                $array = array_map('array_filter', $finalizaciones);
                $finalizaciones = array_filter($array);

                $lastfin=
                DB::table('proyecto_finalizacion as  pf')
                
                ->where('pf.id_project','=',$project->id_project)
                ->where('pf.fechafinalizacion','=',DB::raw("(select max(fechafinalizacion) from proyecto_finalizacion where proyecto_finalizacion.id_project={$project->id_project})"))
                ->first();

             
            
         //   $lastfin= !empty($lastfin) ? 
         //   (object) array_filter((array) $lastfin) : null;

            if(!empty($lastfin)){

             

                //$aux_array = array(["amount" => $lastfin->costofinalizacion, "currency" => "MXN"]);

                //$aux_filter = array_map('array_filter', $aux_array);

                //$aux_filter = array_filter($aux_filter);

                //$aux_filter=json_encode($aux_filter);

                $aux_filter=new stdClass();
                $aux_filter->amount=(int)$lastfin->costofinalizacion;
                $aux_filter->currency="MXN";
                $aux_filter=(object) array_filter((array) $aux_filter);

                //$aux_filter = json_encode($aux_filter);


                $fechafinalizacion = new DateTime(date($lastfin->fechafinalizacion));

                $fechafinalizacion = $fechafinalizacion->format(DateTime::ATOM);


              
                $finobject=new stdClass();

                $finobject->endDate = $fechafinalizacion;
                $finobject->endDateDetails= $lastfin->razonescambioproyecto;

                $finobject->finalValue = $aux_filter;
                $finobject->finalScope = $lastfin->alcancefinalizacion;
                $finobject->finalScopeDetails = $lastfin->referenciainforme;

                if( $finobject->endDateDetails==="No aplica"){
                    unset($finobject->endDateDetails);
                }

                if( $finobject->finalScopeDetails=="No aplica"){
                    unset($finobject->finalScopeDetails);
                }

           //   $finobject->observaciones = $lastfin->observaciones;
                $finobject=(object) array_filter((array) $finobject);

            }else{
                $lastfin=null;
                $finobject=null;
            }


         


                //$finalizaciones=json_encode($finalizaciones, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

                $docs = array();
                $project_documents = DB::table('project_documents')
                    ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                    ->where('id_project', '=', $project->id)
                    ->get();


                foreach ($project_documents as $document) {

                    $documentType = DB::table('documents')
                        ->join('documenttype', 'documents.documentType', '=', 'documenttype.id')
                        ->first();


                    $created_at = new DateTime(date($document->created_at));

                    $created_at = $created_at->format(DateTime::ATOM);

                    $updated_at = new DateTime(date($document->updated_at));

                    $updated_at = $updated_at->format(DateTime::ATOM);


                    $aux = asset('documents/' . $document->url);
                    array_push(
                        $docs,
                        [
                            "id" => (string)$document->id,
                            "documentType" => $documentType->codigo,
                            "url" => str_replace($entities, $replacements, $aux),
                            "datePublished" => $created_at,
                            "dateModified" => $updated_at,
                        ]
                    );
                }
                // $docs=json_encode($docs,JSON_UNESCAPED_UNICODE);

                $array = array_map('array_filter', $docs);
                $docs = array_filter($array);
                $updated = new DateTime(date($project->updated));

                $updated = $updated->format(DateTime::ATOM);

                //para asociar la autoridad publica al array de parties (lo requiere el estándar)


                $autority=
                DB::table('project_organizations')
                
                ->select('project_organizations.id_organization as id','streetAddress','locality','region','postalCode','countryName'
                ,'contact_point.name as name','email as email','contact_point.telephone as telephone','contact_point.url as url')
                ->join('organization','project_organizations.id_organization','=','organization.id')    
                ->join('address','organization.id_address','=','address.id')
                ->join('contact_point','organization.id_contact_point','=','contact_point.id')
                ->where('id_project','=',$project->id_project)
                ->first();

               

                //Para verificar que no contenga datos nulos o vaciós el clase.
               


                $address=new stdClass();

                $address->streetAddress=$autority->streetAddress;
                $address->locality=$autority->locality;
                $address->region=$autority->region;
                $address->postalCode=$autority->postalCode;
                $address->countryName=$autority->countryName;


                

                $contactPoint=new stdClass();
                $contactPoint->name=$autority->name;
                $contactPoint->email=$autority->email;
                $contactPoint->telephone=$autority->telephone;
                $contactPoint->url=$autority->url;

                //Para verificar que no contenga datos nulos o vaciós el clase.
                $address=(object) array_filter((array) $address);
                $contactPoint=(object) array_filter((array) $contactPoint);

                array_push($parties,
                    [   
                        'name'=>$project->name_organization,
                        'id'=>(string)$autority->id,
                        'address'=>$address,
                        'contactPoint'=>$contactPoint,
                        'roles'=>['publicAuthority']
                    
                    ]);

                    $add=array(
                    'streetAddress'=>$project->streetAddress,
                    "locality" => $project->locality,
                    "region" => $project->region,
                    "postalCode" => $project->postalCode,
                    "countryName" => $project->countryName,);

               
              

                    foreach ($add as $clave => $valor) {
                     
                       if($valor=="No Aplica" || $valor=="No aplica" || $valor=="N/A" ||$valor=="N/A.."){
                    
                        unset($add[$clave]);
                       }
                        
                    }

             
            
        
            


                array_push(
                    $datos,
                    [



                        "id" => "oc4ids-mxdy6h-".$project->ocid,
                        "updated" => $updated,
                        "title" => $project->title,
                        "description" => $project->description,
                        "status" => $status->codigo,
                        "sector" => [$subsector->codigo],
                        "purpose" => $project->purpose,
                        "type" => $type->codigo,


                        "locations" =>
                        [
                            [


                                "id" => (string) $project->locationid,
                                "description" => $project->descriptionlocation,
                                "geometry" => ["type" => "Point", "coordinates" => [(float)$principal[0],(float)$principal[1]]],
                                
                                    "address" => $add,
                                
                            ],
                          
                        ],
                        "budget" => $budgetobj,

                        "parties"=> $parties,

                        "publicAuthority" => ["name" => $project->name_organization, "id" => (string)$project->publicAuthority_id],
                        "documents" => $docs,
                        "contractingProcesses" =>
                        
                        [

                              [     
                                  'id'=>"oc4ids-mxdy6h".'-'.$project->id_project,
                                  "summary" => $contratos
                                  
                                  ]


                        
                            
                        ],
                        "completion" => $finobject,

                    ]

                );

               
            }


            $proyecto = $project->id_project;
        }
      
        foreach ($datos as $key => $value) {
        
           

            if($datos[$key]['completion']==null){
                unset($datos[$key]['completion']);
            }

            
          

        }        

        
        foreach ($datos as $key => $value) {
        
           

            if($datos[$key]['documents']==null){
                unset($datos[$key]['documents']);
            }

        }        

        //var_dump($datos);

      
        

        $objDateTime = new DateTime('NOW');
        $lafecha = $objDateTime->format('c'); // ISO8601 formated datetime

        $completo = [
            "uri" => "http://costjalisco.org.mx/project-single/" . $project->id,
            "publishedDate" => $lafecha,
            "version" => "1.0",
            "publisher" => [
                "name" => "CoST Jalisco"
            ],
            "license" => "https://creativecommons.org/licenses/by/4.0/legalcode",
            "projects" => $datos,
        ];

        //var_dump($completo);
       // die();

        

        header('Content-disposition: attachment; filename=projects.json');
        header('Content-type: application/json');





        $json_string = json_encode($completo, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);



        $file = 'proyectos.json';
        // $json= file_put_contents($file, $json_string);

        echo $json_string;
    }
}
