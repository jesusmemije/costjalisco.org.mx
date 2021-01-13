<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
use App\Models\SupportMaterial;
use Illuminate\Http\Request;
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

    public function admincarousel(){

        $h=DB::table('documents')
        ->where('description','=','carrusel')
        ->get();

        if(sizeof($h)==0){
           $edit=false;
        }else{
            $edit=true;
        }

        //print_r($h);

        return view('admin.admincarousel',['edit'=>false]);
    }

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
    }
    return back()->with('status', '¡Las imágenes han sido guardadas correctamente!');
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

    public function support_material(){

        $materials = SupportMaterial::orderBy('created_at', 'desc')->get();
        return view('admin.support-material',['materials'=>$materials]);
    }
    public function materialstore(Request $request){

       // print_r($_POST);

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
}
