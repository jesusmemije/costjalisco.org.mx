<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectStatus;
use App\Models\ProjectSector;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Period;
use App\Models\ProjectType;
use App\Models\Organization;
use App\Models\Address;
use App\Models\BudgetBreakdown;
use App\Models\Completion;
use App\Models\Locations;
use App\Models\Documents;
use App\Models\DocumentType;
use App\Models\Estudios;
use App\Models\ProjectDocuments;
use App\Models\ProjectLocations;
use App\Models\SubSector;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;
use stdClass;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    
    public function index()
    {
        //
       
        
        $projects=DB::table('project')
        ->join('project_organizations','project.id','=','project_organizations.id_project')
        ->join('organization','project_organizations.id_organization','=','organization.id')
        ->join('proyecto_finalizacion','project.id','=','proyecto_finalizacion.id_project')
        ->select('project.*','organization.name','proyecto_finalizacion.costofinalizacion as budget_amount')
        ->get();

        if(empty($projects[0])){
            $projects = Project::orderBy('created_at', 'desc')->get();
        }
     
      
        return view('admin.projects.index',['projects'=>$projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create()
    {
        //

        // $status=DB::table('projectstatus')->select('*')->get();
        $status = ProjectStatus::all();
        $sector = ProjectSector::all();
        $type = ProjectType::all();
        $autoridadPublica = Organization::all();
        return view(
            'admin.projects.proyecto',
            [
                'status' => $status,
                'sectores' => $sector,
                'types' => $type,
                'autoridadP' => $autoridadPublica,


            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

 
   
     public function identificacion($id=null){
        $project=Project::find($id);

        if(empty($p)){
            $sectors = ProjectSector::all();
            $types=ProjectType::all();
            
            $autoridadPublica = Organization::all();
            $documentstype=DocumentType::all();
            $generaldata = new stdClass();
            $generaldata->id_project = '';
            $generaldata->descripcion='';
            $generaldata->responsable='';
            $generaldata->email='';
            $generaldata->organismo='';
            $generaldata->puesto='';
            $generaldata->involucrado='';
            

             return view('admin.projects.identificacion',
             [
                'project'=>new Project(),
                'nav'=>'identificacion',
                'documentstype'=>$documentstype,
                'sectors'=>$sectors,
                'autoridadP'=>$autoridadPublica,
                'generaldata'=>$generaldata,
                'types'=>$types,
                'edit'=>false,
                'ruta'=>'project.saveidentificacion',
             
             
             ]);
        }
    
         

           
        

      
     }
     public function editidentificacion($id){
        $p=Project::find($id);
        if(!empty($p)){
       
        $sectors = ProjectSector::all();
        $types=ProjectType::all();
        $documentstype=DocumentType::all();
        $autoridadPublica = Organization::all();

        $documents=DB::table('project')
        ->join('project_documents','project.id','=','project_documents.id_project')
        ->join('documents','project_documents.id_document','=','documents.id')
        ->where('project.id','=',$id)
        ->wherE('documents.description','=','identificacion')
        ->select('documents.url','documents.id')
        ->get();

      
      
        $data_project=DB::table('project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('address','locations.id_address','=','address.id')
        ->select('project.*','locations.lat','locations.lng','address.streetAddress',
        'address.locality','address.region','address.postalCode','address.countryName')
        ->where('project.id','=',$id)
        ->first();

        $generaldata=DB::table('generaldata')
        ->where('id_project','=',$id)->first();
       
        

         return view('admin.projects.identificacion',
         [
             'project'=>$data_project,
             'generaldata'=>$generaldata,
             'documentstype'=> $documentstype,
             'documents'=>$documents,
            'nav'=>'identificacion',
            'sectors'=>$sectors,
            'autoridadP'=>$autoridadPublica,
            'types'=>$types,
            'edit'=>true,
            'ruta'=>'project.updateidentificacion',

         
         
         ]);
        }else{
            return redirect()->route('project.identificacion');
        }
     }
     public function preparacion($id=null){
     
       
        if(!empty($id)){

            
            $catfac=DB::table('catfac')->get();
            $catambiental=DB::table('catambiental')->get();
            $catimpacto=DB::table('catimpactoterreno')->get();
            $catorigenrecurso=DB::table('catorigenrecurso')->get();
            
            $documents=DB::table('project')
        ->join('project_documents','project.id','=','project_documents.id_project')
        ->join('documents','project_documents.id_document','=','documents.id')
        ->where('project.id','=',$id)
        ->wherE('documents.description','=','preparacion')
        ->select('documents.url','documents.id')
        ->get();

      
            
            $project=DB::table('project')
            ->join('estudiosambiental','project.id','=','estudiosambiental.id_project')
            ->join('estudiosfactibilidad','project.id','=','estudiosfactibilidad.id_project')
            ->join('estudiosimpacto','project.id','=','estudiosimpacto.id_project')
            ->join('project_budgetbreakdown','project.id','=','project_budgetbreakdown.id_project')
            ->join('budget_breakdown','project_budgetbreakdown.id_budget','=','budget_breakdown.id')
            ->join('period','budget_breakdown.id_period','=','period.id')
            ->where('project.id','=',$id)
            ->select('estudiosambiental.*','estudiosfactibilidad.*','estudiosimpacto.*'
            ,'project.id as id','project.status','budget_breakdown.description',
            'budget_breakdown.sourceParty_name',
            'period.startDate as iniciopresupuesto')
            ->first();//solo un registro.
            //description = origenRecurso
          
            if($project==null){
                $project=Project::find($id);
                $medit=false;
                
                if($project==null){
                    return redirect()->route('project.identificacion');
                }
                return view('admin.projects.preparacion',
                [   
                    'project'=>$project,
                    'nav'=>'preparacion',
                    'documents'=>$documents,
                    'catfacs'=>$catfac,
                    'catambientals'=>$catambiental,
                    'catimpactos'=>$catimpacto,
                    'catorigenrecurso'=>$catorigenrecurso,
                    'medit'=>$medit,
                    'edit'=>true,
                    'ruta'=>'project.savepreparacion',
                    
                
                
                ]);
            }else{
   
                $medit=true;
          

          
                return view('admin.projects.preparacion',
                [   
                    'project'=>$project,
                    'nav'=>'preparacion',
                    'documents'=>$documents,
                    'catfacs'=>$catfac,
                    'catambientals'=>$catambiental,
                    'catimpactos'=>$catimpacto,
                    'catorigenrecurso'=>$catorigenrecurso,
                    'edit'=>true,
                    'medit'=>$medit,
                    'ruta'=>'project.updatepreparacion',
                
                
                ]);
            }
         
        
        }
        
            else{
            return redirect()->route('project.identificacion');
           
        }
     }
     public function contratacion($id=null){
         if(empty($id)){
            return redirect()->route('project.identificacion');
        }else{


            $checkambiental= DB::table('estudiosambiental')
            ->where('id_project','=',$id)
            ->get();
            if(empty($checkambiental[0])){
                        
                return redirect()->route('project.preparacion',['project'=>$id]);
            }

            $documents=DB::table('project')
            ->join('project_documents','project.id','=','project_documents.id_project')
            ->join('documents','project_documents.id_document','=','documents.id')
            ->where('project.id','=',$id)
            ->where('documents.description','=','contratacion')
            ->select('documents.url','documents.id')
            ->get();
           

            $project=DB::table('proyecto_contratacion')
            ->join('project','proyecto_contratacion.id_project','=','project.id')
            ->select('proyecto_contratacion.*','project.status','project.id as id')
            ->where('id_project','=',$id)
            ->first();
            $catmodalidad_adjudicacion=DB::table('catmodalidad_adjudicacion')->get();
            $cattipo_contrato=DB::table('cattipo_contrato')->get();
            $catmodalidad_contratacion=DB::table('catmodalidad_contratacion')->get();
            $contractingprocess_status=DB::table('contractingprocess_status')->get();
           
        

           if($project==null){
          
            $project=Project::find($id);
            return view('admin.projects.contratacion',
            [   
                'project'=>$project,
                'nav'=>'contratacion',
                'documents'=>$documents,
                'edit'=>true,
                'catmodalidad_adjudicacion'=>$catmodalidad_adjudicacion,
                'cattipo_contrato'=>$cattipo_contrato,
                'catmodalidad_contratacion'=>$catmodalidad_contratacion,
                'contractingprocess_status'=>$contractingprocess_status,
                'medit'=>false,
                'ruta'=>'project.savecontratacion',
            
            
            ]);
           }else{
            return view('admin.projects.contratacion',
            [   
                'project'=>$project,
                'nav'=>'contratacion',
                'documents'=>$documents,
                'edit'=>true,
                'catmodalidad_adjudicacion'=>$catmodalidad_adjudicacion,
                'cattipo_contrato'=>$cattipo_contrato,
                'catmodalidad_contratacion'=>$catmodalidad_contratacion,
                'contractingprocess_status'=>$contractingprocess_status,
                'medit'=>true,
                'ruta'=>'project.updatecontratacion',
            
            ]);
           }

          

           

    
    } 
     }

     public function ejecucion($id=null){

        if(!empty($id)){

        
            $project=DB::table('proyecto_ejecucion')
            ->join('project','proyecto_ejecucion.id_project','=','project.id')
            ->select('proyecto_ejecucion.*','project.status','project.id as id')
            ->where('id_project','=',$id)
            ->first();
            $documents=DB::table('project')
        ->join('project_documents','project.id','=','project_documents.id_project')
        ->join('documents','project_documents.id_document','=','documents.id')
        ->where('project.id','=',$id)
        ->wherE('documents.description','=','ejecucion')
        ->select('documents.url','documents.id')
        ->get();
            if($project==null){

                $project=Project::find($id);
                
              
                if($project==null){
                    return redirect()->route('project.contratacion',['project'=>$id]);
                }else{
                    if($project->status!=3){
                        return redirect()->route('project.contratacion',['project'=>$id]);
                    }
    
                    return view('admin.projects.ejecucion',
                    [
                        'project'=>$project,
                        'documents'=>$documents,
                        'nav'=>'ejecucion',
                        'edit'=>true,
                        'medit'=>false,
                        'ruta'=>'project.saveejecucion',
                       
                    ]);
                }
              
                
                
            }else{
                return view('admin.projects.ejecucion',
                [
                    'project'=>$project,
                    'documents'=>$documents,
                    'nav'=>'ejecucion',
                    'edit'=>true,
                    'medit'=>true,
                    'ruta'=>'project.updateejecucion',
                   
                ]);
            }
    
    
           
    
        }
        
        

      
     }
     public function finalizacion($id=null){
        if($id!=null){

            $project=DB::table('proyecto_finalizacion')
            ->join('project','proyecto_finalizacion.id_project','=','project.id')
            ->select('proyecto_finalizacion.*','project.status','project.id as id')
            ->where('id_project','=',$id)
            ->first();
            $documents=DB::table('project')
        ->join('project_documents','project.id','=','project_documents.id_project')
        ->join('documents','project_documents.id_document','=','documents.id')
        ->where('project.id','=',$id)
        ->wherE('documents.description','=','finalizacion')
        ->select('documents.url','documents.id')
        ->get();
            
            if($project==null){
           
             
              $project=Project::find($id);
                
          
           
            
            
             
              if($project==null){
                return redirect()->route('project.ejecucion',['project'=>$id]);
               
              }else{
                if($project->status!=4){
                    return redirect()->route('project.ejecucion',['project'=>$id]);
                }
                return view('admin.projects.finalizacion',
                [   
                    'project'=>$project,
                    'documents'=>$documents,
                    'nav'=>'finalizacion',
                    'edit'=>true,
                    'medit'=>false,
                    'ruta'=>'project.savefinalizacion',
                  
                ]);
              } 
              
            }else{

                
               
                return view('admin.projects.finalizacion',
                [   
                    'project'=>$project,
                    'documents'=>$documents,
                    'nav'=>'finalizacion',
                    'edit'=>true,
                    'medit'=>true,
                    'ruta'=>'project.updatefinalizacion',
                ]);
                
       
    }
    }

     }

     public function updateidentificacion(Request $request){
        $fecha_in = date('Y-m-d');

       
        $project = Project::find($request->id_project);

    
        $project->updated = $fecha_in;
        $project->title = $request->tituloProyecto;
        $project->ocid=$request->ocid;
        $project->description = $request->descripcionProyecto;
    
       
        $project->sector = $request->sectorProyecto;
        $project->subsector=$request->subsector;
        $project->purpose = $request->propositoProyecto;
        $project->type = $request->tipoProyecto;
        
      
        $project->publicAuthority_name = '';
        $project->publicAuthority_id = $request->autoridadP;
        
       

       



        $project_location=DB::table('project_locations')
        ->select('id_location')
        ->where('id_project','=',$project->id)
        ->first();

   

        $locations = Locations::find($project_location->id_location);

      
        $locations->description = $request->description;
        $locations->id_geometry = 1;
        $locations->id_gazetter = 1;
        $locations->lat = $request->lat;
        $locations->lng = $request->lng;
       

        $address=Address::find($locations->id_address);
        $address->streetAddress = $request->streetAddress;
        $address->locality = $request->locality;
        $address->region = $request->region;
        $address->postalCode = $request->postalCode;
        $address->countryName = $request->countryName;

    
        


      


    
        $address->save();
        $locations->save();
        $project->save();

        if(!empty($request->docfase1)){    
            
         

            for ($i=0; $i < sizeof($request->docfase1); $i++) { 
                $nombre_img = $_FILES['docfase1']['name'][$i];

                move_uploaded_file($_FILES['docfase1']['tmp_name'][$i],'documents/'.$nombre_img);
                $url=$nombre_img;
        
               
                
        
                $documents=new Documents();
                $documents->documentType=$request->documenttype;
                $documents->description="identificacion";
                $documents->url=$url;
                $documents->save();
        
                $projectdocuments=new ProjectDocuments();
                $projectdocuments->id_project=$project->id;
                $projectdocuments->id_document=$documents->id;
                $projectdocuments->save();

            }
            
     
        }

        $r=DB::table('generaldata')
        ->where('id_project','=',$project->id)
        ->update([
            'descripcion'=>$request->descripcion,
            'responsable'=>$request->responsable,
            'email'=>$request->email,
            'organismo'=>$request->organismo,
            'puesto'=>$request->puesto,
            'involucrado'=>$request->involucrado,
            
        ]);

        return back()->with('status', '¡La fase de identificación ha sido actualizada correctamente!');


     }
     public function updatepreparacion(Request $request){
        $fecha_in = date('Y-m-d');
       
        
        
      

        DB::table('estudiosambiental')
            ->where('id_project','=',$request->id_project)
            ->update([
            'id_project'=>$request->id_project,
            'descripcionAmbiental'=>$request->descripcionAmbiental,
            'tipoAmbiental'=>$request->tipoAmbiental,
            'fecharealizacionAmbiental'=>$request->fecharealizacionAmbiental,
            'responsableAmbiental'=>$request->responsableAmbiental,
        ]);

        DB::table('estudiosfactibilidad')
            ->where('id_project','=',$request->id_project)
            ->update([
            'id_project'=>$request->id_project,
            'descripcionFactibilidad'=>$request->descripcionFactibilidad,
            'tipoFactibilidad'=>$request->tipoFactibilidad,
            'fecharealizacionFactibilidad'=>$request->fecharealizacionFactibilidad,
            'responsableFactibilidad'=>$request->responsableFactibilidad,
        ]);
        DB::table('estudiosimpacto')
            ->where('id_project','=',$request->id_project)
            ->update([
            'id_project'=>$request->id_project,
            'descripcionImpacto'=>$request->descripcionImpacto,
            'tipoImpacto'=>$request->tipoImpacto,
            'fecharealizacionImpacto'=>$request->fecharealizacionImpacto,
            'responsableImpacto'=>$request->responsableImpacto,
        ]);

      
       
        $project_budget=DB::table('project_budgetbreakdown')
        ->where('id_project','=',$request->id_project)
        ->first();
        
       

      
        $presupuesto=BudgetBreakdown::find($project_budget->id_budget);
        $presupuesto->description=$request->origenrecurso;
        $presupuesto->sourceParty_name=$request->fuenterecurso;
       
        
        $period=Period::find($presupuesto->id_period);
        $period->startDate=$request->fecharecurso;
        
        
        $period->save();
        $presupuesto->save();

           //Guardar el documento y la relación con su proyecto.
           if(!empty($request->documentospreparacion)){
            
            for ($i=0; $i <sizeof($request->documentospreparacion) ; $i++) { 
                $nombre_img = $_FILES['documentospreparacion']['name'][$i];
    
                move_uploaded_file($_FILES['documentospreparacion']['tmp_name'][$i],'documents/'.$nombre_img);
                $url=$nombre_img;
        
               
                
        
                $documents=new Documents();
                $documents->documentType=1;
                $documents->description="preparacion";
                $documents->url=$url;
                $documents->save();
        
                $projectdocuments=new ProjectDocuments();
                $projectdocuments->id_project=$request->id_project;
                $projectdocuments->id_document=$documents->id;
                $projectdocuments->save();
                }
            }

        

        return back()->with('status', '¡La fase de preparación ha sido actualizada correctamente!');
       
     }
    public function updatecontratacion(Request $request){
        
        $procedimiento_contratacion=DB::table('proyecto_contratacion')
        ->where('id_project','=',$request->id_project)
        ->update([
            'id_project'=>$request->id_project,
            'descripcion'=>$request->descripcion,
            'fechapublicacion'=>$request->fechapublicacion,
            'entidadadjudicacion'=>$request->entidadadjudicacion,
            'datosdecontacto'=>$request->datosdecontacto,
            'nombreresponsable'=>$request->nombreresponsable,
            'modalidadadjudicacion'=>$request->modalidadadjudicacion,
            'tipocontrato'=>$request->tipocontrato,
            'modalidadcontrato'=>$request->modalidadcontrato,
            
            'empresasparticipantes'=>$request->empresasparticipantes,
            'entidad_admin_contrato'=>$request->entidad_admin_contrato,
            'titulocontrato'=>$request->titulocontrato,
            'empresacontratada'=>$request->empresacontratada,
            'viapropuesta'=>$request->viapropuesta,
            'fechapresentacionpropuesta'=>$request->fechapresentacionpropuesta,
            'montocontrato'=>$request->montocontrato,
            'alcancecontrato'=>$request->alcancecontrato,
            'fechainiciocontrato'=>$request->fechainiciocontrato,
            'duracionproyecto_contrato'=>$request->duracionproyecto_contrato,
                   

        ]);


        ProjectController::havedocuments($request,'contratacion');

        if($procedimiento_contratacion){
            return back()->with('status', '¡La fase de contratación ha sido actualizada correctamente!');
       
        }else{
            return back()->with('status', 'La información no ha podido ser registrada');
        }
    }

     public function updateejecucion(Request $request){
        
        $proyecto_ejecucion=DB::table('proyecto_ejecucion')
        ->where('id_project','=',$request->id_project)
        ->update([
            'id_project'=>$request->id_project,
            'descripcion'=>$request->descripcion,
            'variacionespreciocontrato'=>$request->variacionespreciocontrato,
            'razonescambiopreciocontrato'=>$request->razonescambiopreciocontrato,
            'variacionesduracioncontrato'=>$request->variacionesduracioncontrato,
            'razonescambioduracioncontrato'=>$request->razonescambioduracioncontrato,
            'variacionesalcancecontrato'=>$request->variacionesalcancecontrato,
            'razonescambiosalcancecontrato'=>$request->razonescambiosalcancecontrato,
            'aplicacionescalatoria'=>$request->aplicacionescalatoria,
            'estadoactualproyecto'=>$request->estadoactualproyecto,


        ]);

           ProjectController::havedocuments($request,'ejecucion');

        

        if($proyecto_ejecucion){
         

            return back()->with('status', '¡La fase de ejecución ha sido actualizada correctamente!');
        }else{
            return back()->with('status', '¡La fase de ejecución no ha podido actualizarse!');
        }
     }
     public function updatefinalizacion(Request $request){
         
        $proyecto_finalizacion=DB::table('proyecto_finalizacion')
        ->where('id_project','=',$request->id_project)
        ->update([
            'id_project'=>$request->id_project,
            'descripcion'=>$request->descripcion,
            'costofinalizacion'=>$request->costofinalizacion,
            'fechafinalizacion'=>$request->fechafinalizacion,
            'alcancefinalizacion'=>$request->alcancefinalizacion,
            'razonescambioproyecto'=>$request->razonescambioproyecto,
            'referenciainforme'=>$request->referenciainforme,


        ]);
        ProjectController::havedocuments($request,'finalizacion');
        if($proyecto_finalizacion){
            return back()->with('status', '¡La fase de finalización ha sido actualizada correctamente!');
        }else{
            return back()->with('status', '¡La información no ha podido ser registrada!');
        }
        
     }
     public function savefinalizacion(Request $request){
        

         $proyecto_finalizacion=DB::table('proyecto_finalizacion')
         ->insert([
             'id_project'=>$request->id_project,
             'descripcion'=>$request->descripcion,
             'costofinalizacion'=>$request->costofinalizacion,
             'fechafinalizacion'=>$request->fechafinalizacion,
             'alcancefinalizacion'=>$request->alcancefinalizacion,
             'razonescambioproyecto'=>$request->razonescambioproyecto,
             'referenciainforme'=>$request->referenciainforme,
 
 
         ]);
         ProjectController::havedocuments($request,'finalizacion');
 
         if($proyecto_finalizacion){
             DB::table('project')
             ->where('id',$request->id_project)
             ->update(['status'=>5]);
 
             return back()->with('status', '¡El formulario ha sido completado y guardado correctamente!');
         }else{
            
         }
 


        
     }
     public function saveejecucion(Request $request){

     
        
        $proyecto_ejecucion=DB::table('proyecto_ejecucion')
        ->insert([
            'id_project'=>$request->id_project,
            'descripcion'=>$request->descripcion,
            'estadoactualproyecto'=>$request->estadoactualproyecto,


        ]);
        ProjectController::havedocuments($request,'ejecucion');

        if($proyecto_ejecucion){
            DB::table('project')
            ->where('id',$request->id_project)
            ->update(['status'=>4]);

            return redirect()->route('project.finalizacion',[
                'project'=>$request->id_project,
                ]);;
        }else{
           
        }

     }

    public function savecontratacion(Request $request){
       
        $procedimiento_contratacion=DB::table('proyecto_contratacion')
        ->insert([
            'id_project'=>$request->id_project,
            'descripcion'=>$request->descripcion,
            'fechapublicacion'=>$request->fechapublicacion,
            'entidadadjudicacion'=>$request->entidadadjudicacion,
            'datosdecontacto'=>$request->datosdecontacto,
            'nombreresponsable'=>$request->nombreresponsable,
            'modalidadadjudicacion'=>$request->modalidadadjudicacion,
            'tipocontrato'=>$request->tipocontrato,
            'modalidadcontrato'=>$request->modalidadcontrato,
            'estadoactual'=>$request->estadoactual,
            'empresasparticipantes'=>$request->empresasparticipantes,
            'entidad_admin_contrato'=>$request->entidad_admin_contrato,
            'titulocontrato'=>$request->titulocontrato,
            'empresacontratada'=>$request->empresacontratada,
            'viapropuesta'=>$request->viapropuesta,
            'fechapresentacionpropuesta'=>$request->fechapresentacionpropuesta,
            'montocontrato'=>$request->montocontrato,
            'alcancecontrato'=>$request->alcancecontrato,
            'fechainiciocontrato'=>$request->fechainiciocontrato,
            'duracionproyecto_contrato'=>$request->duracionproyecto_contrato,
                   

        ]);
        
        ProjectController::havedocuments($request,'contratacion');
    


        if($procedimiento_contratacion){
            DB::table('project')
            ->where('id',$request->id_project)
            ->update(['status'=>3]);

            return redirect()->route('project.ejecucion',[
                'project'=>$request->id_project,
                ]);;
        }else{
           
        }

    }

    public function savepreparacion(Request $request){
       
        $fecha_in = date('Y-m-d');
       
      
      

        DB::table('estudiosambiental')->insert([
            'id_project'=>$request->id_project,
            'descripcionAmbiental'=>$request->descripcionAmbiental,
            'tipoAmbiental'=>$request->tipoAmbiental,
            'fecharealizacionAmbiental'=>$request->fecharealizacionAmbiental,
            'responsableAmbiental'=>$request->responsableAmbiental,
        ]);

        DB::table('estudiosfactibilidad')->insert([
            'id_project'=>$request->id_project,
            'descripcionFactibilidad'=>$request->descripcionFactibilidad,
            'tipoFactibilidad'=>$request->tipoFactibilidad,
            'fecharealizacionFactibilidad'=>$request->fecharealizacionFactibilidad,
            'responsableFactibilidad'=>$request->responsableFactibilidad,
        ]);
        DB::table('estudiosimpacto')->insert([
            'id_project'=>$request->id_project,
            'descripcionImpacto'=>$request->descripcionImpacto,
            'tipoImpacto'=>$request->tipoImpacto,
            'fecharealizacionImpacto'=>$request->fecharealizacionImpacto,
            'responsableImpacto'=>$request->responsableImpacto,
        ]);

        DB::table('project')
        ->where('id',$request->id_project)
        ->update(['status'=>2]);

       
        

      
        $presupuesto=new BudgetBreakdown();
        $presupuesto->description=$request->origenrecurso;
        $presupuesto->sourceParty_name=$request->fuenterecurso;
       
        
        $period=new Period();
        $period->startDate=$request->fecharecurso;
        $period->save();

        $presupuesto->id_period=$period->id;
        $presupuesto->save();

        DB::table('project_budgetbreakdown')
        ->insert([

            'id_project'=>$request->id_project,
            'id_budget'=>$presupuesto->id,
        ]);


        //Guardar el documento y la relación con su proyecto.
 

        if(!empty($request->documents)){
            
            for ($i=0; $i <sizeof($request->documents) ; $i++) { 
                $nombre_img = $_FILES['documents']['name'][$i];
    
                move_uploaded_file($_FILES['documents']['tmp_name'][$i],'documents/'.$nombre_img);
                $url=$nombre_img;
        
               
                
        
                $documents=new Documents();
                $documents->documentType=1;
                $documents->description="preparacion";
                $documents->url=$url;
                $documents->save();
        
                $projectdocuments=new ProjectDocuments();
                $projectdocuments->id_project=$request->id_project;
                $projectdocuments->id_document=$documents->id;
                $projectdocuments->save();
                }


            }

           

        return redirect()->route('project.contratacion',[
        'project'=>$request->id_project,
        ]);;
       



    }
     
    public function saveidentificacion(Request $request){
        
        $fecha_in = date('Y-m-d');
        /*
        $request->validate([
            'title'=>'required',
            'ocid'=>'required'

        ]);
       */
        
            
        $project = new Project();
        $project->ocid = $request->ocid;
        $project->updated = $fecha_in;
        $project->title = $request->tituloProyecto;
        $project->description = $request->descripcionProyecto;
        $project->status = 1;
       
        $project->sector = $request->sectorProyecto;
        $project->subsector=$request->subsector;
        $project->purpose = $request->propositoProyecto;
        $project->type = $request->tipoProyecto;
        
      
        $project->publicAuthority_name = '';
        $project->publicAuthority_id = $request->autoridadP;
        
       

        $project->save();
               //general data save.

        $r=DB::table('generaldata')
        ->insert([
            'id_project'=>$project->id,
            'descripcion'=>$request->descripcion,
            'responsable'=>$request->responsable,
            'email'=>$request->email,
            'organismo'=>$request->organismo,
            'puesto'=>$request->puesto,
            'involucrado'=>$request->involucrado,

        ]);

        DB::table('project_organizations')->insert([

            'id_project'=>$project->id,
            'id_organization'=>$request->autoridadP,
        ]
        );

        $address = new Address();
        $address->streetAddress = $request->streetAddress;
        $address->locality = $request->locality;
        $address->region = $request->region;
        $address->postalCode = $request->postalCode;
        $address->countryName = $request->countryName;
        $address->save();


        $locations = new Locations();
        $locations->description = $request->description;
        $locations->id_geometry = 1;
        $locations->id_gazetter = 1;
        $locations->id_address = $address->id;
        $locations->lat = $request->lat;
        $locations->lng = $request->lng;
        $locations->save();




        $project_locations = new ProjectLocations();
        $project_locations->id_project = $project->id;
        $project_locations->id_location = $locations->id;
        $project_locations->save();


        //Guardar el documento y la relación con su proyecto.
        if(!empty($request->docfase1)){    
            
         

            for ($i=0; $i < sizeof($request->docfase1); $i++) { 
                $nombre_img = $_FILES['docfase1']['name'][$i];

                move_uploaded_file($_FILES['docfase1']['tmp_name'][$i],'documents/'.$nombre_img);
                $url=$nombre_img;
        
               
                
        
                $documents=new Documents();
                $documents->documentType=$request->documenttype;
                $documents->description="identificacion";
                $documents->url=$url;
                $documents->save();
        
                $projectdocuments=new ProjectDocuments();
                $projectdocuments->id_project=$project->id;
                $projectdocuments->id_document=$documents->id;
                $projectdocuments->save();

            }
            
     
        }
        

     
      
     return redirect()->route('project.preparacion',['project'=>$project->id]);;
       
    }


    public function store(Request $request)
    {
        //

       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function destroy($id)
    {
        //
    
        $project = Project::find($id);

    
        

        if(!empty($project))
        {       


        $project_documents=ProjectDocuments::where('id_project','=',$id)
        ->get();
        foreach ($project_documents as $document) {
           
            Documents::destroy($document->id);
        }
       
        
       
        //uso first en vez de get() porque get me retorna un array...

    
        $project_locations = ProjectLocations::where('id_project','=',$id)
        ->first();

        
             
        $locations = Locations::find($project_locations->id_location);

        $project_budget=DB::table('project')
        ->join('project_budgetbreakdown','project.id','=','project_budgetbreakdown.id_project')
        ->select('project_budgetbreakdown.id_budget')
        ->where('project.id','=',$id)
        ->first();

        if($project_budget!=null){
            BudgetBreakdown::destroy($project_budget->id_budget);
        }
       
        
       
       
        Project::destroy($id);
        Address::destroy($locations->id_address);
     
        return back()->with('status', '¡Proyecto eliminado con éxito!');
        }
        else
        {     
            return back()->with('status', '¡Proyecto no encontrado!');
            echo "no data";
        }
      

    }
    public function deletedocument(Request $request){
        
            
         $document=Documents::find($request->doc_id);
              
        $url=public_path().'/documents'.'/'.$document->url;
     


       unlink($url);
       $document->delete();
       return back()->with('status', '¡Documento eliminado!');
    }
    public static function havedocuments(Request $request,$fase){
        
        
        if(!empty($request->documents)){
            
            for ($i=0; $i <sizeof($request->documents) ; $i++) { 
                $nombre_img = $_FILES['documents']['name'][$i];
    
                move_uploaded_file($_FILES['documents']['tmp_name'][$i],'documents/'.$nombre_img);
                $url=$nombre_img;
        
               
                
        
                $documents=new Documents();
                $documents->documentType=1;
                $documents->description=$fase;
                $documents->url=$url;
                $documents->save();
        
                $projectdocuments=new ProjectDocuments();
                $projectdocuments->id_project=$request->id_project;
                $projectdocuments->id_document=$documents->id;
                $projectdocuments->save();
                }
            }
    }
    
    
}
