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

    public function project_search(){

        $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
      
        return view('front.project_search', [
            'projects' => $projects
        ]);
    }
    
    public function projects(){
        return view('front.projects');
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
    public function listworks(){

        $projects = DB::table('project')->orderBy('created_at', 'desc')->get();
      
        return view('front.listworks', [
            'projects' => $projects
        ]);

    }
    public function supportmaterial(){
        return view('front.supportmaterial');
    }
    public function journal(){
        return view('front.journal');
    }
}
