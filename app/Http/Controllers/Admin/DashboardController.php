<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Documents;
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
}
