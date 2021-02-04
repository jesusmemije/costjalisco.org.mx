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
        // Consultas de la vista inicio o home

        // Buscamos y contamos los proyectos que tienen un presupuesto asignado en el monto contrato
        $proyectos = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->select(DB::raw('count(*) as total_proyectos'))
        ->whereNotNull('proyecto_contratacion.montocontrato')
        ->get();

        if (empty($proyectos[0]->total_proyectos)) {
            $total_proyectos=0;
        } else {
            $total_proyectos=$proyectos[0]->total_proyectos;
        }


        // Consultamos todas las organizaciones y los contamos
        $organizacion=DB::table('organization')
        ->select(DB::raw('count(*) as total_organization'))
        ->get();

        if (empty($organizacion[0]->total_organization)) {
            $total_organization=0;
        } else {
            $total_organization=$organizacion[0]->total_organization;
        }

        // Consultamos la cantidad de personas beneficiadas
        $personas_beneficiadas = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->select(DB::raw('SUM(project.people) as total_p_beneficiada'))
        ->whereNotNull('proyecto_contratacion.montocontrato')
        ->get();

        if (empty($personas_beneficiadas[0]->total_p_beneficiada)) {
            $total_beneficiarios=0;
        } else {
            $total_beneficiarios=$personas_beneficiadas[0]->total_p_beneficiada;
        }

        // Consultamos y contamos el monto total del presupuesto del contrato
        $monto_contrato = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as monto_total'))
        ->whereNotNull('proyecto_contratacion.montocontrato')
        ->get();
        
        if (empty($monto_contrato[0]->monto_total)) {
            $total_contrato=0;
        } else {
            $total_contrato=$monto_contrato[0]->monto_total;
        }

        // Consultamos todos lo proyectos que tengan ya el valor asiganado en monto contrato y lo mostramos el carousel 
        $projects = DB::table('project')
        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('address', 'locations.id_address', '=', 'address.id')
        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
        ->join('subsector', 'project.subsector', '=', 'subsector.id')
        ->select('project.*','project.id as id_project', 'address.*','proyecto_contratacion.montocontrato') 
        ->whereNotNull('proyecto_contratacion.montocontrato')
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
    /**Funciones que obtienen las vistas del frente del sitio */
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
    public function sitemap()
    {
        return view('front.sitemap');
    }
    
    public function support_material()
    {
        $materials = SupportMaterial::orderBy('created_at', 'desc')->get();
        return view('front.support-material',['materials'=>$materials]);
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
    public function journal(){
        $journal=DB::table('news')
        ->join('tbl_img','news.id_img','=','tbl_img.id')
        ->select('news.*','tbl_img.*')
        ->where('news.status_news','=','Publicado')
        ->get();

        return view('front.journal',['journal'=>$journal]);
    }


    public function statistics()
    {
       
        $sector1 = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            // ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
            // ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
            // ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
            ->select('projectsector.*')
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->where('project.sector','=',1)
            ->get();
        $sector2 = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            // ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
            // ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
            // ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
            ->select('projectsector.*')
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->where('project.sector','=',2)
            ->get();
        $sector3 = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            // ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
            // ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
            // ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
            ->select('projectsector.*')
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->where('project.sector','=',3)
            ->get();
        $sector4 = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            // ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
            // ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
            // ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
            ->select('projectsector.*')
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->where('project.sector','=',4)
            ->get();

        $proyectos = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('count(*) as total_proyectos,project_organizations.id_organization,organization.name'))
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->groupBy('project_organizations.id_organization','organization.name')
            ->get();

// ------------aqui hacemos el cálculo para el presupuesto ejercido
        $organizaciones_presupuesto = DB::table('organization')
        ->select('organization.*')
        ->get();

        $monto_contrato_or = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as monto_total,project_organizations.id_organization,organization.name,project.id as pro_id'))
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->groupBy('project_organizations.id_organization','organization.name','project.id')
            ->get();
            
        $costofinalizacion_contrato = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as contrato_total_costofin,project_organizations.id_organization,organization.name,project.id as pro_id'))
            ->whereNotNull('proyecto_finalizacion.costofinalizacion')
            ->groupBy('project_organizations.id_organization','organization.name','project.id')
            ->get();

        $costofinalizacion_or = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_finalizacion.costofinalizacion) as total_costofin,project_organizations.id_organization,organization.name,project.id as pro_id'))
            ->whereNotNull('proyecto_finalizacion.costofinalizacion')
            ->groupBy('project_organizations.id_organization','organization.name','project.id')
            ->get();

        // dd($monto_contrato_or,$costofinalizacion_or);

        // dd($monto_contrato_or);



        // cantidad total
        $monto_contrato = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as monto_total'))
            ->whereNotNull('proyecto_contratacion.montocontrato')
            ->get();
        if (empty($monto_contrato[0]->monto_total)) {
            $total_contrato=0;
        } else {
            $total_contrato=$monto_contrato[0]->monto_total;
        }

        $monto_contrato_restar = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_contratacion.montocontrato) as total_contrato_restar'))
            ->whereNotNull('proyecto_finalizacion.costofinalizacion')
            ->get();

        if (empty($monto_contrato_restar[0]->total_contrato_restar)) {
            $total_cont_restar=0;
        } else {
            $total_cont_restar=$monto_contrato_restar[0]->total_contrato_restar;
        }

        $monto_costofinalizacion = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(proyecto_finalizacion.costofinalizacion) as monto_costofin'))
            ->whereNotNull('proyecto_finalizacion.costofinalizacion')
            ->get();

        if (empty($monto_costofinalizacion[0]->monto_costofin)) {
            $total_costofin=0;
        } else {
            $total_costofin=$monto_costofinalizacion[0]->monto_costofin;
        }

        $total_presupuesto_ejercido=($total_contrato-$total_cont_restar)+$total_costofin;


// --------------------------------------------------------------------------------------------


        $modalidad_adjudicacion = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
            ->join('catmodalidad_adjudicacion','proyecto_contratacion.modalidadadjudicacion','=','catmodalidad_adjudicacion.id')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('count(*) as total_project, catmodalidad_adjudicacion.titulo as mod_adjudicacion'))
            // ->whereNotNull('proyecto_finalizacion.costofinalizacion')
            ->groupBy('catmodalidad_adjudicacion.titulo')
            ->get();

        $procedimiento_etapas = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('count(*) as total_status_project, project.status as estatus'))
            ->groupBy('project.status')
            ->get();
        
        $personas_beneficias = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->join('project_locations','project.id','=','project_locations.id_project')
            ->join('locations','project_locations.id_location','=','locations.id')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('subsector', 'project.subsector', '=', 'subsector.id')
            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
            ->select(DB::raw('SUM(project.people) as total_people,project_organizations.id_organization,organization.name'))
            ->groupBy('project_organizations.id_organization','organization.name')
            ->get();
        
      
        return view('front.statistics',['costofinalizacion_contrato'=>$costofinalizacion_contrato,'organizaciones_presupuesto'=>$organizaciones_presupuesto,'personas_beneficias'=>$personas_beneficias,'procedimiento_etapas'=>$procedimiento_etapas,'modalidad_adjudicacion'=>$modalidad_adjudicacion,'costofinalizacion_or'=>$costofinalizacion_or,'monto_contrato_or'=>$monto_contrato_or,'total_presupuesto_ejercido'=>$total_presupuesto_ejercido,'proyectos'=>$proyectos,'sector1'=>$sector1,'sector2'=>$sector2,'sector3'=>$sector3,'sector4'=>$sector4]);
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
            }
        }
        
      
        return view('front.project_search', [
            'projects' => $projects
        ]);
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
