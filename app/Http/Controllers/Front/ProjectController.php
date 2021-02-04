<?php

namespace App\Http\Controllers\Front;

use App\Exports\AllProjectDataExport;
use App\Exports\ProjectDataExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
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
                ->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                ->leftJoin('proyecto_ejecucion', 'project.id', '=', 'proyecto_ejecucion.id_project')
                ->leftJoin('proyecto_finalizacion', 'project.id', '=', 'proyecto_finalizacion.id_project')
                ->select(
                    'project.*',
                    'generaldata.*',
                    'locations.id_address',
                    'locations.principal',
                    'locations.lat as lat',
                    'locations.lng as lng',
                    'locations.description as descriptionlocation',
                    'proyecto_contratacion.*',
                    'proyecto_ejecucion.*',
                    'proyecto_ejecucion.*',
                    'proyecto_finalizacion.*',
                    'project.id as id_project',
                    'generaldata.observaciones as observaciones1',
                    'project.observaciones as observaciones2',
                    'proyecto_contratacion.observaciones as observaciones4',
                    'proyecto_ejecucion.observaciones as observaciones5',
                    'proyecto_finalizacion.observaciones as observaciones6',
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


            $empresas = $all->empresasparticipantes;
            $empresasparticipantes = explode(",", $empresas);

            $sector = DB::table('projectsector')
                ->where('id', '=', $project->sector)
                ->first();

            $subsector = DB::table('subsector')
                ->where('id', '=', $project->subsector)
                ->select('titulo')
                ->first();

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
                'empresasparticipantes' => $empresasparticipantes,
                'subsector' => $subsector,
                'tipocontrato' => $tipocontrato,
                'modalidadcontratacion' => $modalidadcontratacion,
                'modalidadadjudicacion' => $modalidadadjudicacion,
                'estadoactual' => $estadoactual,
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

    public function export($id)
    {
        $name = 'data' . $id . '.xlsx';

        $excel = Excel::download(new ProjectDataExport($id), $name);
        return $excel;
    
    }
    public function exportall(){
        $name = 'alldataprojects.xlsx';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }
    public function exportallcsv(){
        $name = 'alldataprojects.csv';

        $excel = Excel::download(new AllProjectDataExport(), $name);
        return $excel;
    }
}
