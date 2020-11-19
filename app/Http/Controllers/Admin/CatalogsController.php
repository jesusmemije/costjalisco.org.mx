<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubSector;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalogsController extends Controller
{
    //


    //Vista que se manda a llamar en  donde están "todos" los cátalogos.
    public function cat_sectors(){
        $sectores=DB::table('projectsector')->get();
       
        $estudiosambiental=DB::table('catambiental')->get();


        return view('admin.catalogs.sectors',
        [
            'sectores'=>$sectores,
           
        
        ]);
    }
    /** Project Type   *****/
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

    /** End Projec Type */
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
        
        $r=DB::table('catambiental')->delete($request->to_id);
        if($r){
            
            return back()->with('status', '¡Estudio eliminado correctamente!');
        }else{
            return back()->with('status', '¡El estudio no se pudo eliminar!');
        }
    }

    /** END ESTUDIO AMBIENTAL */

    
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
            
            $r=DB::table('catfac')->delete($request->to_id);
            if($r){
                
                return back()->with('status', '¡Estudio eliminado correctamente!');
            }else{
                return back()->with('status', '¡El estudio no se pudo eliminar!');
            }
        }
    
        /** END ESTUDIO FACTIBILIDAD */

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
    
        /** END ESTUDIO IMPACTO TERRENO */
    
    /**  ORIGEN DEL RECURSO  */    
    public function resource(){

        $origenrecurso=DB::table('catorigenrecurso')->get();
       
        return view('admin.catalogs.resource',
        [
            'origenrecurso'=>$origenrecurso,
           
        
        ]);

      

    }

    public function saveresource(Request $request){

        $r=DB::table('catorigenrecurso')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Recurso registrado correctamente!');
        }else{
            return back()->with('status', '¡El recurso no se pudo registrar!');
        }
        
    }
    public function editresource(Request $request){
        $r=DB::table('catorigenrecurso')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Recurso actualizado correctamente!');
        }else{
            return back()->with('status', '¡El recurso no se pudo actualizar!');
        }
    }
    public function deleteresource(Request $request){
        
        $r=DB::table('catorigenrecurso')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Recurso eliminado correctamente!');
        }else{
            return back()->with('status', '¡El recurso no se pudo eliminar!');
        }
    }
    /**  END ORIGEN DEL RECURSO */


    //Adjudication

    public function adjudication(){

        $adjudications=DB::table('catmodalidad_adjudicacion')->get();
       
        return view('admin.catalogs.adjudication',
        [
            'adjudications'=>$adjudications,
           
        
        ]);

      

    }

    public function saveadjudication(Request $request){

        $r=DB::table('catmodalidad_adjudicacion')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Adjudicación registrada correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo registrar!');
        }
        
    }
    public function editadjudication(Request $request){
        $r=DB::table('catmodalidad_adjudicacion')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Adjudicación actualizado correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo actualizar!');
        }
    }
    public function deleteadjudication(Request $request){
        
        $r=DB::table('catmodalidad_adjudicacion')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Adjudicación eliminada correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo eliminar!');
        }
    }

    public function contracttype(){
        $types=DB::table('cattipo_contrato')->get();

        return view('admin.catalogs.contracttype',[
            'types'=>$types,
        ]);
    }

    public function savecontracttype(Request $request){

        $r=DB::table('cattipo_contrato')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Contrato registrado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo registrar!');
        }
        
    }
    public function editcontracttype(Request $request){
        $r=DB::table('cattipo_contrato')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Contrato actualizado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo actualizar!');
        }
    }
    public function deletecontracttype(Request $request){
        
        $r=DB::table('cattipo_contrato')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Contrato eliminado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo eliminar!');
        }
    }

    public function contracting(){
        $contracts= DB::table('catmodalidad_contratacion')->get();

        return view('admin.catalogs.contracting',[
            'contracts'=>$contracts,
        ]);
    }

    public function savecontracting(Request $request){

        $r=DB::table('catmodalidad_contratacion')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Contrato registrado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo registrar!');
        }
        
    }
    public function editcontracting(Request $request){
        $r=DB::table('catmodalidad_contratacion')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Contrato actualizado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo actualizar!');
        }
    }
    public function deletecontracting(Request $request){
        
        $r=DB::table('catmodalidad_contratacion')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Contrato eliminado correctamente!');
        }else{
            return back()->with('status', '¡El contrato no se pudo eliminar!');
        }
    }

    public function contractstatus(){
        $contractsstatus=DB::table('contractingprocess_status')->get();

        return view('admin.catalogs.contractstatus',[
            'contractsstatus'=>$contractsstatus,
        ]);
    }

    public function savecontractstatus(Request $request){

        $r=DB::table('contractingprocess_status')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Estado de contrato registrado correctamente!');
        }else{
            return back()->with('status', '¡El estado de contrato no se pudo registrar!');
        }
        
    }
    public function editcontractstatus(Request $request){
        $r=DB::table('contractingprocess_status')
        ->where('id',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Estado de contrato actualizado correctamente!');
        }else{
            return back()->with('status', '¡El estado del contrato no se pudo actualizar!');
        }
    }
    public function deletecontractstatus(Request $request){
        
        $r=DB::table('contractingprocess_status')->delete($request->delete_id);
        if($r){
            
            return back()->with('status', '¡Estado de contrato eliminado correctamente!');
        }else{
            return back()->with('status', '¡El estado del contrato no se pudo eliminar!');
        }
    }

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
    public function deletesubsector(Request $request){
        
       

        $del=DB::table('subsector')
        ->where('id','=',$request->to_id)
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
    /*****************   END CRUD SSECTOR ********************/
   

    public function subsectores(){
        
        $id=$_POST['id'];
    

        $data=DB::table('sectorsubsector')
        ->join('subsector','sectorsubsector.id_subsector','=','subsector.id')
        ->where('id_sector','=',$id)
        ->select('subsector.id','titulo')
        ->get();

      return $data;
    

    }
}
