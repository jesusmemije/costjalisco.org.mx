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
        $projects = DB::table('project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
            ->join('address', 'locations.id_address', '=', 'address.id')
            ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
            ->get();
        
        return view('front.home', [
            'projects' => $projects
        ]);
    }

    public function know_more()
    {
        return view('front.know-more');
    }

    public function about_us()
    {
        return view('front.about-us');
    }

    public function resources()
    {
        return view('front.resources');
    }

    public function statistics()
    {
        $sectores = DB::table('project')
        ->join('projectsector','project.sector','=','projectsector.id')
        ->select('projectsector.*')
        ->distinct()
        ->get();

        $sector1 = DB::table('project')
        ->join('projectsector','project.sector','=','projectsector.id')
        ->select('projectsector.*')
        ->where('project.sector','=',1)
        ->get();
        $sector2 = DB::table('project')
        ->join('projectsector','project.sector','=','projectsector.id')
        ->select('projectsector.*')
        ->where('project.sector','=',2)
        ->get();
        $sector3 = DB::table('project')
        ->join('projectsector','project.sector','=','projectsector.id')
        ->select('projectsector.*')
        ->where('project.sector','=',3)
        ->get();
        $sector4 = DB::table('project')
        ->join('projectsector','project.sector','=','projectsector.id')
        ->select('projectsector.*')
        ->where('project.sector','=',4)
        ->get();


        // if (count($sectores)==0) {
        //     $sectorarray=0;
        // } else {
        //     foreach ($sectores as $sector) {
                

        //         $sectorarray[$sector->titulo] = $proyects[0]->t_proyect;
        //     }
        // }
        // dd($sectorarray);

        
        


        $proyectos = DB::table('project')
        ->select(DB::raw('count(*) as total_proyectos'))
        ->get();

        if (empty($proyectos[0]->total_proyectos)) {
            $total_proyectos=0;
        } else {
            $total_proyectos=$proyectos[0]->total_proyectos;
        }
             
        $monto_contrato = DB::table('project')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->select(DB::raw('SUM(montocontrato) as monto_total'))
            ->get();

        if (empty($monto_contrato[0]->monto_total)) {
            $total_contrato=0;
        } else {
            $total_contrato=$monto_contrato[0]->monto_total;
        }
        
        return view('front.statistics',['total_contrato'=>$total_contrato,'total_proyectos'=>$total_proyectos,'sectores'=>$sectores,'sector1'=>$sector1,'sector2'=>$sector2,'sector3'=>$sector3,'sector4'=>$sector4]);
    }

    public function interest_sites()
    {
        return view('front.interest-sites');
    }

    public function account()
    {
          
       // return view('auth.account'); ?????????????????
    }

    public function contact_us()
    {
        return view('front.contact-us');
    }

    public function project_search(Request $request){

        if (empty($request->nombre_proyecto)) {
            if(empty($request->municipio)){
                $projects=DB::table('project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*','locations.*')
                    // ->where('address.locality','=',$request->municipio)
                    ->get();
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
        } else {
            if(empty($request->municipio)){
                $projects=DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*','locations.*')
                    // ->where('address.locality','=',$request->municipio)
                    ->orWhere('project.title','like','%'.$request->nombre_proyecto.'%')
                    ->get();
            }else{

                $projects=DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector','project.sector','=','projectsector.id')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address','locations.id_address','=','address.id')
                    ->select('project.*','locations.*')
                    ->where('address.locality','=',$request->municipio)
                    ->orWhere('project.title','like','%'.$request->nombre_proyecto.'%')
                    ->get();
                // if (empty($request->id_sector)) {
                //     $projects=DB::table('project')
                //     // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //     ->join('projectsector','project.sector','=','projectsector.id')
                //     ->join('project_locations','project.id','=','project_locations.id_project')
                //     ->join('locations','project_locations.id_location','=','locations.id')
                //     ->join('address','locations.id_address','=','address.id')
                //     ->select('project.*','locations.*')
                //     ->where('address.locality','=',$request->municipio)
                //     ->where('project.title','=',$request->nombre_proyecto)
                //     ->get();
                // } else {
                //     if (empty($request->id_subsector)) {
                //         $projects=DB::table('project')
                //         // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //         ->join('projectsector','project.sector','=','projectsector.id')
                //         ->join('project_locations','project.id','=','project_locations.id_project')
                //         ->join('locations','project_locations.id_location','=','locations.id')
                //         ->join('address','locations.id_address','=','address.id')
                //         ->select('project.*','locations.*')
                //         ->where('address.locality','=',$request->municipio)
                //         ->where('project.sector','=',$request->id_sector)
                //         ->get();
                //     } else {
                //         if (empty($request->codigo_postal)) {
                //             $projects=DB::table('project')
                //             // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //             ->join('projectsector','project.sector','=','projectsector.id')
                //             ->join('project_locations','project.id','=','project_locations.id_project')
                //             ->join('locations','project_locations.id_location','=','locations.id')
                //             ->join('address','locations.id_address','=','address.id')
                //             ->select('project.*','locations.*')
                //             ->where('address.locality','=',$request->municipio)
                //             ->where('project.sector','=',$request->id_sector)
                //             ->where('project.subsector','=',$request->id_subsector)
                //             ->get();
                //         } else {
                //             $projects=DB::table('project')
                //             // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //             ->join('projectsector','project.sector','=','projectsector.id')
                //             ->join('project_locations','project.id','=','project_locations.id_project')
                //             ->join('locations','project_locations.id_location','=','locations.id')
                //             ->join('address','locations.id_address','=','address.id')
                //             ->select('project.*','locations.*')
                //             ->where('address.locality','=',$request->municipio)
                //             ->where('project.sector','=',$request->id_sector)
                //             ->where('project.subsector','=',$request->id_subsector)
                //             ->where('address.postalCode','=',$request->codigo_postal)
                //             ->get();
                //         }
                        
                        
                //     }
                    
                    
                    
                // }
                
            }
        }
        

        

        // $projects = DB::table('project')->get();
      
        return view('front.project_search', [
            'projects' => $projects
        ]);
        }
    public function sitemap()
    {
        return view('front.sitemap');
    }
    
    public function support_material()
    {
        return view('front.support-material');
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

    public function organizations()
    {
        $publicos = DB::table('dir_org')
            ->where('sector', '=', 'Sector Público')
            ->get();
        $academicos = DB::table('dir_org')
            ->where('sector', '=', 'Sector Académico')
            ->get();
        $privados = DB::table('dir_org')
            ->where('sector', '=', 'Sector Privado')
            ->get();
        $organizados = DB::table('dir_org')
            ->where('sector', '=', 'Sociedad Civil Organizada')
            ->get();
        $estrategicos = DB::table('dir_org')
            ->where('sector', '=', 'Aliados Estratégicos')
            ->get();

        return view('front.organizations', [
            'publicos' => $publicos,
            'academicos' => $academicos,
            'privados' => $privados,
            'organizados' => $organizados,
            'estrategicos' => $estrategicos,
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

    public function journal(){
        return view('front.journal');
    }

}
