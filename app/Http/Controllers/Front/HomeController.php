<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SupportMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {   
        
        $proyectos = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select(DB::raw('count(*) as total_proyectos'))
        ->get();

        if (empty($proyectos[0]->total_proyectos)) {
            $total_proyectos=0;
        } else {
            $total_proyectos=$proyectos[0]->total_proyectos;
        }



        $organizacion=DB::table('organization')
        ->select(DB::raw('count(*) as total_organization'))
        ->get();

        if (empty($organizacion[0]->total_organization)) {
            $total_organization=0;
        } else {
            $total_organization=$organizacion[0]->total_organization;
        }


        $personas_beneficiadas = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select(DB::raw('SUM(project.people) as total_p_beneficiada'))
        ->get();

        if (empty($personas_beneficiadas[0]->total_p_beneficiada)) {
            $total_beneficiarios=0;
        } else {
            $total_beneficiarios=$personas_beneficiadas[0]->total_p_beneficiada;
        }


        $monto_contrato = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as monto_total'))
        ->get();
        
        if (empty($monto_contrato[0]->monto_total)) {
            $total_contrato=0;
        } else {
            $total_contrato=$monto_contrato[0]->monto_total;
        }

        
        $projects = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('address', 'locations.id_address', '=', 'address.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select('project.*','project.id as id_project', 'address.*','proyecto_contratacion.montocontrato') 
        ->get();
        
            $h=DB::table('documents')
            ->where('description','=','carrusel')
            ->get();

          
        return view('front.home', [
            'projects' => $projects,
            'h'=>$h,
            'total_organization'=>$total_organization,
            'total_proyectos'=>$total_proyectos,
            'total_contrato'=>$total_contrato,
            'total_beneficiarios'=>$total_beneficiarios,
           
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

    public function multisectorial()
    {
        return view('front.multisectorial');
    }


    public function resources()
    {
        return view('front.resources');
    }

    public function statistics()
    {
        // $sectores = DB::table('project')
        // ->join('projectsector','project.sector','=','projectsector.id')
        // ->select('projectsector.*')
        // ->distinct()
        // ->get();
        // $all = DB::table('project')
        // ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        // ->join('project_locations','project.id','=','project_locations.id_project')
        // ->join('locations','project_locations.id_location','=','locations.id')
        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        // ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        // ->join('subsector', 'project.subsector', '=', 'subsector.id')
        // ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        // ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        // ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        // ->select(
        //     'project.*','proyecto_contratacion.*')
        //     // 'generaldata.*',
        //     // 'locations.*',
        //     // 'locations.description as descriptionlocation',
        //     // 'estudiosambiental.*',
        //     // 'estudiosfactibilidad.*',
        //     // 'estudiosimpacto.*',)
        // // ->where('project.id', '=', $this->id)
        // ->get();


        $sector1 = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select('projectsector.*')
        ->where('project.sector','=',1)
        ->get();
        $sector2 = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select('projectsector.*')
        ->where('project.sector','=',2)
        ->get();
        $sector3 = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select('projectsector.*')
        ->where('project.sector','=',3)
        ->get();
        $sector4 = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select('projectsector.*')
        ->where('project.sector','=',4)
        ->get();

        $proyectos = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select(DB::raw('count(*) as total_proyectos'))
        ->get();

        if (empty($proyectos[0]->total_proyectos)) {
            $total_proyectos=0;
        } else {
            $total_proyectos=$proyectos[0]->total_proyectos;
        }
             
        $monto_contrato = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
        ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
        ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
        ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as monto_total'))
        ->get();
        
        if (empty($monto_contrato[0]->monto_total)) {
            $total_contrato=0;
        } else {
            $total_contrato=$monto_contrato[0]->monto_total;
        }
        
        return view('front.statistics',['total_contrato'=>$total_contrato,'total_proyectos'=>$total_proyectos,'sector1'=>$sector1,'sector2'=>$sector2,'sector3'=>$sector3,'sector4'=>$sector4]);
    }

    public function interest_sites()
    {
        return view('front.interest-sites');
    }

    public function account()
    {
       return view('auth.account');
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
        $materials = SupportMaterial::orderBy('created_at', 'desc')->get();
        return view('front.support-material',['materials'=>$materials]);
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
        $journal=DB::table('news')
        ->join('tbl_img','news.id_img','=','tbl_img.id')
        ->select('news.*','tbl_img.*')
        ->where('news.status_news','=','Publicado')
        ->get();

        return view('front.journal',['journal'=>$journal]);
    }

    

   

}
