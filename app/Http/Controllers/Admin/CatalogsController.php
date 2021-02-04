<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubSector;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/*
Controlador que incluye los crud's de los catálagos relacionados con los estudios 
de los proyectos
*/

class CatalogsController extends Controller
{
    
    public function cat_sectors(){
        $sectores=DB::table('projectsector')->get();
       
        $estudiosambiental=DB::table('catambiental')->get();


        return view('admin.catalogs.sectors',
        [
            'sectores'=>$sectores,
           
        ]);
    }
    /** CRUD PROJECT TYPE *****/
    public function projecttype(){

        $tipos=DB::table('projecttype')->get();


        return view('admin.catalogs.projecttype',[
            'tipos'=>$tipos
        ]);

    }
    public function saveprojecttype(Request $request){

        $r=  DB::table('projecttype')->insert([
            ['titulo' => $request->titulo],
           
        ], ['titulo'], ['titulo']);
        if($r){
            return back()->with('status', '¡Tipo de proyecto registrado!');
        }else{
            return back()->with('status', 'El tipo de proyecto no se pudo registrar');
        }


    }
    public function deleteprojecttype(Request $request){
       
        $r=DB::table('projecttype')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Tipo de proyecto eliminado correctamente!');
        }else{
            return back()->with('status', '¡El tipo de proyecto no se pudo eliminar!');
        }
    }
    public function editprojecttype(Request $request){
        
        $r= DB::table('projecttype')
        ->where('id','=',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);

        if($r){
            
            return back()->with('status', '¡Tipo de proyecto actualizado correctamente!');
        }else{
            return back()->with('status', '¡El tipo de proyecto no se pudo actualizat!');
        }
    }

    /** FIN CRUD Project Type */
    /* Vista estudios para el CRUD de estudies */
    public function studies(){
        $estudiosambiental=DB::table('catambiental')->get();
        $estudiosfactibilidad=DB::table('catfac')->get();
        $estudiosimpactoterreno=DB::table('catimpactoterreno')->get();
        return view('admin.catalogs.studies',[
            'estudiosambiental'=>$estudiosambiental,
            'estudiosfactibilidad'=>$estudiosfactibilidad,
            'estudiosimpactoterreno'=>$estudiosimpactoterreno,
        ]);
    }

    /*** CRUD ESTUDIO AMBIENTAL */
    public function saveestudioAmbiental(Request $request){
        
    try {
       
     
      $r=  DB::table('catambiental')->insert([

            'titulo'=>$request->titulo,
        ]);

        if($r){
            
            return back()->with('status', '¡Estudio registrado correctamente!');
        }else{
            return back()->with('status', '¡El estudio no se pudo registrar!');
        }

    }catch (\Throwable $th) {
            
        return back()->with('status', '¡El estudio no se pudo registrar!');
        }

    }
    public function editestudioAmbiental(Request $request){

    

        $r=DB::table('catambiental')
            ->where('id',$request->edit_id)
            ->update(['titulo'=>$request->newtitulo]);
            if($r){
            
                return back()->with('status', '¡Estudio actualizado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo actualizar!');
            }
    }

    public function deleteestudioAmbiental(Request $request){
     
        $r=DB::table('catambiental')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Estudio eliminado correctamente!');
        }else{
            return back()->with('status', '¡El estudio no se pudo eliminar!');
        }
    }

    /** FIN ESTUDIO AMBIENTAL */

    
    /*** CRUD ESTUDIO FACTIBILIDAD */
    public function saveestudioFactibilidad(Request $request){
        
        try {
           
         
          $r=  DB::table('catfac')->insert([
    
                'titulo'=>$request->titulo,
            ]);
    
            if($r){
                
                return back()->with('status', '¡Estudio registrado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo registrar!');
            }
    
        }catch (\Throwable $th) {
                
            return back()->with('status', '¡El estudio no se pudo registrar!');
            }
    
        }
        public function editestudioFactibilidad(Request $request){
    
        
    
            $r=DB::table('catfac')
                ->where('id',$request->edit_id)
                ->update(['titulo'=>$request->newtitulo]);
                if($r){
                
                    return back()->with('status', '¡Estudio actualizado correctamente!');
                }else{
                    return back()->with('status', '¡El estudio no se pudo actualizar!');
                }
        }
    
        public function deleteestudioFactibilidad(Request $request){
          
            $r=DB::table('catfac')->delete($request->delete_id);
            if($r){
                
                return back()->with('status', '¡Estudio eliminado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo eliminar!');
            }
        }
    
        /** FIN ESTUDIO FACTIBILIDAD */

          /*** CRUD ESTUDIO IMPACTO TERRENO */
    public function saveestudioImpacto(Request $request){
        
        try {
           
         
          $r=  DB::table('catimpactoterreno')->insert([
    
                'titulo'=>$request->titulo,
            ]);
    
            if($r){
                
                return back()->with('status', '¡Estudio registrado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo registrar!');
            }
    
        }catch (\Throwable $th) {
                
            return back()->with('status', '¡El estudio no se pudo registrar!');
            }
    
        }
        public function editestudioImpacto(Request $request){
    
        
            $r=DB::table('catimpactoterreno')
                ->where('id',$request->edit_id)
                ->update(['titulo'=>$request->newtitulo]);
                if($r){
                
                    return back()->with('status', '¡Estudio actualizado correctamente!');
                }else{
                    return back()->with('status', '¡El estudio no se pudo actualizar!');
                }
        }
    
        public function deleteestudioImpacto(Request $request){
            
            $r=DB::table('catimpactoterreno')->delete($request->delete_id);
            if($r){
                
                return back()->with('status', '¡Estudio eliminado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo eliminar!');
            }
        }
    
        /** FIN ESTUDIO IMPACTO TERRENO */
    /**
     * 
     * Función llamada mediante ajax en la vista 'Catalogs->sectors.blade.php'.
     * Obtiene los subsectores relacionados a un nombre de sector pasado mendiante 
     * post y retorna un json con todos los subsectores asociados a un nombre de sector.
     */

    public function getdatafromnamesector(){
        $name=$_POST['name'];

        $sector=DB::table('projectsector')
        ->where('titulo','=',$name)
        ->select('projectsector.id')
        ->first();

        $data=DB::table('sectorsubsector')
        ->join('subsector','sectorsubsector.id_subsector','=','subsector.id')
        ->where('id_sector','=',$sector->id)
        ->select('subsector.id as id', 'titulo')
        ->get();

        echo json_encode($data);
       

    }
    /**CRUD SUBSECTOR */
    public function deletesubsector(Request $request){
        
       

        $del=DB::table('subsector')
        ->where('id','=',$request->delete_id)
        ->delete();

        if($del){
            return back()->with('status', 'Subsector eliminado correctamente!');
        }else{
            return back()->with('status', 'El subsector no se pudo eliminar');
        }
    }
    public function savesubsector(Request $request){
       
       
        
        $sector=DB::table('projectsector')
        ->select('id')
        ->where('titulo','=',$request->name_sector)
        ->first();
        
     

        $id_sub=new SubSector();
        $id_sub->titulo=$request->titulo;

        $id_sub->save();

        

        $sectorsubsector=DB::table('sectorsubsector')
        ->insert([
            'id_sector'=>$sector->id,
            'id_subsector'=>$id_sub->id,

        ]);

        if($sectorsubsector){
            return back()->with('status', 'Subsector registrado!');
        }else{
            return back()->with('status', 'El subsector no pudo registrarse');
        }

    }
    /** FIN CRUD SUBSECTOR */
  /*****************  CRUD SECTOR  ********************/

    public function editsector(Request $request){
        
        $r=DB::table('projectsector')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
            return back()->with('status', 'Sector actualizado');
        }else{
            return back()->with('status', 'El sector no pudo actualizarse');
        }
    }
    public function editsubsector(Request $request){
        $r=DB::table('subsector')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
            return back()->with('status', 'Subsector actualizado');
        }else{
            return back()->with('status', 'El subsector no pudo actualizarse');
        }
    }

    public function deletesector(Request $request){
       
        $r=DB::table('sectorsubsector')
        ->where('sectorsubsector.id_sector','=',$request->delete_id)
        ->get();

        foreach ($r as $data) {
           DB::table('subsector')
           ->where('id','=',$data->id_subsector)
           ->delete();
        }


        
       $delete= DB::table('projectsector')
        ->where('id','=',$request->delete_id)
        ->delete();
      



        if($delete){
            return back()->with('status', '¡Sector eliminado correctamente!');
        }else{
            return back()->with('status', 'El sector no pudo eliminarse');
        }


    }
    public function savesector(Request $request){

        
      $sector=  DB::table('projectsector')->upsert([
            ['titulo' => $request->titulo],
           
        ], ['titulo'], ['titulo']);

        if($sector){
            return back()->with('status', 'Sector registrado!');
        }else{
            return back()->with('status', 'El sector no pudo registrarse');
        }
    }
    /*****************   FIN CRUD SSECTOR ********************/
   

    public function subsectores(){
        
        $id=$_POST['id'];
    

        $data=DB::table('sectorsubsector')
        ->join('subsector','sectorsubsector.id_subsector','=','subsector.id')
        ->where('id_sector','=',$id)
        ->select('subsector.id','titulo')
        ->orderBy('titulo', 'asc')
        ->get();

      return $data;
    

    }
}
