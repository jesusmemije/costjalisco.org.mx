<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function list_projects(Request $request)
    {

      
      
        if(empty($request->municipio)){
            $projects=DB::table('project')
            ->join('projects_imgs','project.id','=','projects_imgs.id_project')
            ->join('projectsector','project.sector','=','projectsector.id')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('address','locations.id_address','=','address.id')
            ->select('project.*','projects_imgs.imgroute')
            // ->where('address.locality','=',$request->municipio)
            ->get();
            // $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
        }else{
            if (empty($request->id_sector)) {
                $projects=DB::table('project')
                // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projects_imgs','project.id','=','projects_imgs.id_project')
                ->join('projectsector','project.sector','=','projectsector.id')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address','locations.id_address','=','address.id')
                ->select('project.*','projects_imgs.imgroute')
                ->where('address.locality','=',$request->municipio)
                ->get();
            } else {
                if (empty($request->id_subsector)) {
                    $projects=DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projects_imgs','project.id','=','projects_imgs.id_project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*','projects_imgs.imgroute')
                    ->where('address.locality','=',$request->municipio)
                    ->where('project.sector','=',$request->id_sector)
                    ->get();
                } else {
                    if (empty($request->codigo_postal)) {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projects_imgs','project.id','=','projects_imgs.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*','projects_imgs.imgroute')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->get();
                    } else {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projects_imgs','project.id','=','projects_imgs.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*','projects_imgs.imgroute')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->where('address.postalCode','=',$request->codigo_postal)
                        ->get();
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
        $projects = DB::table('project')->orderBy('created_at', 'desc')->get();

        return view('front.card-projects', [
            'projects' => $projects
        ]);
    }

    public function project_single($id)
    {
        $project = Project::find($id);
        if($project!=null){
            $project_documents=DB::table('project_documents')
            ->join('documents','project_documents.id_document','=','documents.id')
            ->where('id_project','=',$id)
            ->get();
            $project_ambiental=DB::table('estudiosambiental')
            ->where('id_project','=',$id)
            ->first();
            $project_factibilidad=DB::table('estudiosfactibilidad')
            ->where('id_project','=',$id)
            ->first();
            
            $project_impacto=DB::table('estudiosimpacto')
            ->where('id_project','=',$id)
            ->first();
           /* $impacto=DB::table('catimpactoterreno')
            ->where('tipoImpacto','=',$project_impacto)
            ->first();*/

            $ambiental=$project_ambiental->numeros_ambiental;
            $responsable_ambiental=$project_ambiental->responsableAmbiental;


            $factibilidad=$project_factibilidad->numeros_factibilidad;
            $responsable_factibilidad=$project_factibilidad->responsableFactibilidad;

            $impacto=$project_impacto->numeros_impacto;
            $responsable_impacto=$project_impacto->responsableImpacto;
        
            
          
           
            $subsector=DB::table('subsector')
            ->where('id','=',$project->subsector)
            ->select('titulo')
            ->first();

            $contratacion=DB::table('proyecto_contratacion')
            ->where('id_project','=',$id)
            ->first();

            $tipocontrato=DB::table('cattipo_contrato')
            ->where('id','=',$contratacion->tipocontrato)
            ->first();
            
            $modalidadcontratacion=DB::table('catmodalidad_contratacion')
            ->where('id','=',$contratacion->modalidadcontrato)
            ->first();

            $entidad_admin_contrato=$contratacion->entidad_admin_contrato;
            $titulocontrato=$contratacion->titulocontrato;
            $viapropuesta=$contratacion->viapropuesta;
            $montocontrato=$contratacion->montocontrato;
            $alcancecontrato=$contratacion->alcancecontrato;
            $duracionproyecto_contrato=$contratacion->duracionproyecto_contrato;

            $empresasparticipantes=$contratacion->empresasparticipantes;

            $empresasparticipantes = explode(",", $empresasparticipantes);

            $entidadadjudicacion=$contratacion->entidadadjudicacion;

            $proyecto_ejecucion=DB::table('proyecto_ejecucion')
            ->where('id_project','=',$id)
            ->first();

            $proyecto_finalizacion=DB::table('proyecto_finalizacion')
            ->where('id_project','=',$id)
            ->first();

         
         

            $identificacion=array();
            $preparacion=array();
            $contratacion=array();
            $ejecucion=array();
            $finalizacion=array();
            
            foreach($project_documents as $document){
              
                switch($document->description){
                    case 'identificacion':
                    array_push($identificacion,$document->url);
                    break;
                    case 'preparacion':
                    array_push($preparacion,$document->url);
                    break;
                    case 'contratacion':
                    array_push($contratacion,$document->url);
                    break;
                    case 'ejecucion':
                    array_push($ejecucion,$document->url);
                    break;
                    case 'finalizacion':
                    array_push($finalizacion,$document->url);
                    break;

                }
            }
            
          

            return view('front.project-single', [
                
            'project' => $project,
            'identificacion'=>$identificacion,
            'preparacion'=>$preparacion,
            'contratacion'=>$contratacion,
            'ejecucion'=>$ejecucion,
            'finalizacion'=>$finalizacion,
            'subsector'=>$subsector,
            'impacto'=>$impacto,
            'responsable_impacto'=>$responsable_impacto,
            'ambiental'=>$ambiental,
            'responsable_ambiental'=>$responsable_ambiental,
            'factibilidad'=>$factibilidad,
            'responsable_factibilidad'=>$responsable_factibilidad,
            'tipocontrato'=>$tipocontrato,
            'modalidadcontratacion'=>$modalidadcontratacion,
            'entidad_admin_contrato'=>$entidad_admin_contrato,
            'titulocontrato'=>$titulocontrato,
            'viapropuesta'=>$viapropuesta,
            'montocontrato'=>$montocontrato,
            'alcancecontrato'=>$alcancecontrato,
            'duracionproyecto_contrato'=>$duracionproyecto_contrato,
            'empresasparticipantes'=>$empresasparticipantes,
            'entidadadjudicacion'=>$entidadadjudicacion,
            'proyecto_ejecucion'=>$proyecto_ejecucion,     
            'proyecto_finalizacion'=>$proyecto_finalizacion,     

            
            ]);
        }else{
            return redirect()->route('list-projects');
        }
    }
   
}
