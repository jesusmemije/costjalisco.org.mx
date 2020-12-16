<?php

namespace App\Http\Controllers\Front;



use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function know_more(){
        return view('front.know-more');
    }

    public function about_us(){
        return view('front.about-us');
    }

    public function resources(){
        return view('front.resources');
    }

    public function statistics(){
        return view('front.statistics');
    }

    public function interest_sites(){
        return view('front.interest-sites');
    }

    public function specific_project( $id )
    {
        $project = Project::find($id);
        if($project!=null){
            $project_documents=DB::table('project_documents')
            ->join('documents','project_documents.id_document','=','documents.id')
            ->where('id_project','=',$id)
            ->get();
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
            
          

            return view('front.specific-project', [
                
            'project' => $project,
            'identificacion'=>$identificacion,
            'preparacion'=>$preparacion,
            'contratacion'=>$contratacion,
            'ejecucion'=>$ejecucion,
            'finalizacion'=>$finalizacion,

            
            ]);
        }else{
            return redirect()->route('home.listworks');
        }
      
    }
    public function account(){
        return view('front.account');
    }
    public function organizations(){

        $publicos=DB::table('dir_org')
        ->where('sector','=','Sector Público')
        ->get();
        $academicos=DB::table('dir_org')
        ->where('sector','=','Sector Académico')
        ->get();
        $privados=DB::table('dir_org')
        ->where('sector','=','Sector Privado')
        ->get();
        $organizados=DB::table('dir_org')
        ->where('sector','=','Sociedad Civil Organizada')
        ->get();
        $estrategicos=DB::table('dir_org')
        ->where('sector','=','Aliados Estratégicos')
        ->get();
       
        return view('front.organizations',[

            'publicos'=>$publicos,
            'academicos'=>$academicos,
            'privados'=>$privados,
            'organizados'=>$organizados,
            'estrategicos'=>$estrategicos,
            
        ]);
    }
    public function contactus(){
        return view('front.contactus');
    }
    public function newsletters(){
        return view('front.newsletters');
    }

    public function project_search(Request $request){


        if(empty($request->municipio)){
            $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
        }else{
            if (empty($request->id_sector)) {
                $projects=DB::table('project')
                // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projectsector','project.sector','=','projectsector.id')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address','locations.id_address','=','address.id')
                ->select('project.*','locations.*')
                ->where('address.locality','=',$request->municipio)
                ->get();
            } else {
                if (empty($request->id_subsector)) {
                    $projects=DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*','locations.*')
                    ->where('address.locality','=',$request->municipio)
                    ->where('project.sector','=',$request->id_sector)
                    ->get();
                } else {
                    if (empty($request->codigo_postal)) {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*','locations.*')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->get();
                    } else {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*','locations.*')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->where('address.postalCode','=',$request->codigo_postal)
                        ->get();
                    }
                    
                    
                }
                
                
                
            }
            
        }

        // $projects = DB::table('project')->get();
      
        return view('front.project_search', [
            'projects' => $projects
        ]);
    }
    
    public function projects()
    {
        $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
      
        return view('front.projects', [
            'projects' => $projects
        ]);

    }
    public function motor_busqueda(){
        return view('front.motor_busqueda');
    }
    public function boletines_all(){
        return view('front.boletines_all');
    }
    public function estadisticas(){
        return view('front.estadisticas');
    }
    public function sitemap(){
        return view('front.sitemap');
    }
    public function listworks(Request $request){

        // dd($request->all());

        if(empty($request->municipio)){
            $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
        }else{
            if (empty($request->id_sector)) {
                $projects=DB::table('project')
                // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projectsector','project.sector','=','projectsector.id')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address','locations.id_address','=','address.id')
                ->select('project.*')
                ->where('address.locality','=',$request->municipio)
                ->get();
            } else {
                if (empty($request->id_subsector)) {
                    $projects=DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*')
                    ->where('address.locality','=',$request->municipio)
                    ->where('project.sector','=',$request->id_sector)
                    ->get();
                } else {
                    if (empty($request->codigo_postal)) {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->get();
                    } else {
                        $projects=DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector','project.sector','=','projectsector.id')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address','locations.id_address','=','address.id')
                        ->select('project.*')
                        ->where('address.locality','=',$request->municipio)
                        ->where('project.sector','=',$request->id_sector)
                        ->where('project.subsector','=',$request->id_subsector)
                        ->where('address.postalCode','=',$request->codigo_postal)
                        ->get();
                    }
                    
                    
                }
                
                
                
            }
            
        }

      
        return view('front.listworks', [
            'projects' => $projects
        ]);

    }
    public function supportmaterial(){
        return view('front.supportmaterial');
    }


    public function sectores(Request $request){

        if ($request->ajax()) {
            $sectores=DB::table('project')
            ->join('projectsector','project.sector','=','projectsector.id')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('address','locations.id_address','=','address.id')
            ->select('projectsector.*')
            ->where('address.locality','=',$request->municipio_id)
            ->get();
            if (count($sectores)==0) {
                $sectoresArray[0] = 'No se encontraron sectores';
            } else {
                foreach ($sectores as $sector) {
                    $sectoresArray[$sector->id] = $sector->titulo;
                }
            }
            
            
            return response()->json($sectoresArray);
        }
        

    }

    public function subsectores(Request $request){

        
        if ($request->ajax()) {
            $sub_sectores=DB::table('subsector')
            ->join('sectorsubsector','subsector.id','=','sectorsubsector.id_subsector')
            ->join('projectsector','sectorsubsector.id_sector','=','projectsector.id')
            // ->join('locations','project_locations.id_location','=','locations.id')
            // ->join('address','locations.id_address','=','address.id')
            ->select('subsector.*')
            ->where('projectsector.id','=',$request->sector_id)
            ->get();
            

            if (count($sub_sectores)==0) {
                $subsectoresArray[0] = 'No se encontraron subsectores';
            } else {
                foreach ($sub_sectores as $sub_sector) {
                    $subsectoresArray[$sub_sector->id] = $sub_sector->titulo;
                }
            }
            
            
            return response()->json($subsectoresArray);
        }
    }
    public function codigo_postales(Request $request){

        if ($request->ajax()) {
            $codigo_postales=DB::table('project')
            ->join('projectsector','project.sector','=','projectsector.id')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('address','locations.id_address','=','address.id')
            ->select('address.*')
            ->where('project.subsector','=',$request->sub_sector_id)
            ->get();

            if (count($codigo_postales)==0) {
                $codigo_postalesArray[0] = 'No hay codigo postal';
            } else {
                foreach ($codigo_postales as $codigo_postal) {
                    $codigo_postalesArray[$codigo_postal->postalCode] = $codigo_postal->postalCode;
                }
            }
            
            
            return response()->json($codigo_postalesArray);
        }
    }
}
