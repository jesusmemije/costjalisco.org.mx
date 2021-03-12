<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\Project;
use App\Models\SupportMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    

    public function formwizard()
    {

       
        return view('admin.formwizard');
    }
    /** CRUD para el carrusel principal del sitio . */
    public function admincarousel(){

        $h=DB::table('documents')
        ->where('description','=','carrusel')
        ->get();
        //Válida si existe uno actualemente para mostrarlo o no.
        if(sizeof($h)==0){
           $edit=false;
        }else{
            $edit=true;
        }

        //print_r($h);

        return view('admin.admincarousel',['edit'=>false]);
    }
    /*Función que procesa el formulario de 'views->admincarousel.blade.php'
    Verifica que contenga imágenes, y recorre el array de imagenes para guardarlas
    con un nombre generado por la hora actual y el nombre original de la imagen y guardarlas
    en la ruta 'public/assets/img/home/slider-main/'.
    */
    public function savecarousel(Request $request){
        if($request->hasFile('images')){

          
            for ($i=0; $i <sizeof($request->images) ; $i++) { 
            $nombre_img = $_FILES['images']['name'][$i];
            $url=time().$nombre_img;
            move_uploaded_file($_FILES['images']['tmp_name'][$i],'assets/img/home/slider-main/'.$url);
            

            $d=new Documents();
            $d->description='carrusel';
            $d->url=$url;
            $d->save();
           
    
        }
        return back()->with('status', '¡Las imágenes han sido guardadas correctamente!');
    }else{
        return back()->with('status', '¡Las imágenes no se podieron guardar!');
    }
    
    }
    public function deletecarousel(){

        $d=DB::table('documents')
        ->where('description','=','carrusel')
        ->get();

     

        for ($i=0; $i <sizeof($d) ; $i++) { 
            $ruta='assets/img/home/slider-main/'.$d[$i]->url;
            if(file_exists(($ruta))){
               unlink($ruta);
            }
        }
        $deletedRows = Documents::where('description', 'carrusel')->delete();
        return back()->with('status', '¡Las imágenes han sido eliminadas correctamente!');
    }
    /**CRUD para los materiales de apoyo */
    public function support_material(){

        $materials = SupportMaterial::orderBy('created_at', 'desc')->get();
        return view('admin.support-material',['materials'=>$materials]);
    }
    public function materialstore(Request $request){

       

        $sm= new SupportMaterial();
        $sm->titulo=$request->titulo;
        $sm->descripcion=$request->descripcion;
        $sm->url=$request->url;
        $sm->modulo=$request->modulo;
        $sm->save();


        return back()->with('status', '¡El material de apoyo se ha guardado correctamente!');
    }
    public function materialedit(Request $request){

        $sm=SupportMaterial::find($request->id);
        $sm->titulo=$request->titulo;
        $sm->descripcion=$request->descripcion;
        $sm->url=$request->url;
        $sm->modulo=$request->modulo;
        $sm->save();
        return back()->with('status', '¡El material de apoyo se ha actualizado correctamente!');
    }
    public function materialdestroy(Request $request){
       SupportMaterial::destroy($request->id);
       return back()->with('status', '¡El material de apoyo se ha eliminado correctamente!');
    }

    /**Fin del CRUD para los materiales de apoyo */

    //Obtiene la vista del listado de descargables(proyectos)

    public function downloadable(){
         //Se verifica el tipo de usuario.

         $id_user = Auth::user()->role_id;
         //print_r($id_user);
         //1=Admin. Obtiene todos los registros de proyectos sin restricción.
         if ($id_user == 1) {
             $projects = DB::table('project')
                 ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                 ->leftJoin('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                 ->leftJoin('organization', 'project_organizations.id_organization', '=', 'organization.id')
                 //  ->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                 ->join('doproject', 'project.id', '=', 'doproject.id_project')
                 //  ->where('doproject.id_user', '=', $id_user)
                 ->select(
                     'project.*',
                     'project.id as id_project',
                     'project.updated_at as fechap',
                     'organization.name  as orgname',
                     //        'proyecto_contratacion.montocontrato as montocontrato',
                     'generaldata.*'
                 )
                 ->get();
         }
         //Agente sectorial
         if ($id_user == 3) {
 
             $id_organization = Auth::user()->id_organization;
             $projects = DB::table('project')
                 ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                 ->leftJoin('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                 ->leftJoin('organization', 'project_organizations.id_organization', '=', 'organization.id')
                 //->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
                 ->join('doproject', 'project.id', '=', 'doproject.id_project')
                 ->where('project.publicAuthority_id', '=', $id_organization)
                 ->select(
                     'project.*',
                     'project.id as id_project',
                     'project.updated_at as fechap',
                     'organization.name  as orgname',
                     //         'proyecto_contratacion.montocontrato as montocontrato',
                     'generaldata.*'
                 )
                 ->get();
         }
         /**Esto es sólo para el caso de que no haya proyectos en la posición indicada
          * y para que solo se obtengan los proyectos que un usuario determinado haya subido.
          */
         if (empty($projects[0])) {
 
 
             $projects = Project::orderBy('project.created_at', 'desc')
                 ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                 ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                 ->join('doproject', 'project.id', '=', 'doproject.id_project')
                 ->where('doproject.id_user', '=', $id_user)
                 ->select('project.*', 'project.id as id_project', 'organization.name  as orgname')
                 ->get();
         }
 
 
 
         return view('admin.downloadable', ['projects' => $projects]);
    }

    public function downloadQR(Request $request){

   

        
        $dimensiones="";

        switch($request->dimensiones){
            case "1":
                $dimensiones="150x150";
                break;
            case "2":
                $dimensiones="250x250";
                break;
            case "3":
                $dimensiones="350x350";
                break;
            case "4":
                $dimensiones="500x500";
                break;
            default:
                $dimensiones="300x300";

        }

      
        $url="http://costjalisco.org.mx/project-single/".$request->id;
      
        $src="https://chart.googleapis.com/chart?chs=".$dimensiones."&cht=qr&chl=".$url."&choe=UTF-8";

        header('Content-Type: image/png');
header('Content-Disposition: attachment; filename=QR'.$request->id.'.png');
$image = file_get_contents($src);
header('Content-Length: ' . strlen($image));
echo $image;

   

    }
 
}
