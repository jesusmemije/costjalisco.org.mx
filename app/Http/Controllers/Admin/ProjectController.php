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
        ->select('project.*','organization.name')
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
          
             return view('admin.projects.identificacion',
             [
                'project'=>new Project(),
                'nav'=>'identificacion',
                'sectors'=>$sectors,
                'autoridadP'=>$autoridadPublica,
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
     
        $autoridadPublica = Organization::all();
      
        $data_project=DB::table('project')
        ->join('project_locations','project.id','=','project_locations.id_project')
        ->join('locations','project_locations.id_location','=','locations.id')
        ->join('address','locations.id_address','=','address.id')
        ->select('project.*','locations.lat','locations.lng','address.streetAddress',
        'address.locality','address.region','address.postalCode','address.countryName')
        ->where('project.id','=',$id)
        ->first();


        

         return view('admin.projects.identificacion',
         [
             'project'=>$data_project,
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
            'estadoactualproyecto'=>$request->estadoactualproyecto,


        ]);

     

        

        if($proyecto_ejecucion){
         

            return back()->with('status', '¡La fase de ejecución ha sido actualizada correctamente!');
        }else{
           
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

        return redirect()->route('project.contratacion',[
        'project'=>$request->id_project,
        ]);;
       



    }
     
    public function saveidentificacion(Request $request){
        
        $fecha_in = date('Y-m-d');

       
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
        $nombre_img = $_FILES['docfase1']['name'];

        move_uploaded_file($_FILES['docfase1']['tmp_name'],'documents/'.$nombre_img);
        $url=$nombre_img;

       
        $doctype=new DocumentType();
        $doctype->titulo=$request->documenttype;
        $doctype->save();

        $documents=new Documents();
        $documents->documentType=$doctype->id;
        $documents->url=$url;
        $documents->save();

        $projectdocuments=new ProjectDocuments();
        $projectdocuments->id_project=$project->id;
        $projectdocuments->id_document=$documents->id;
        $projectdocuments->save();
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
    
    //Vista que se manda a llamar en  donde están "todos" los cátalogos.
    public function cat_sectores(){
        $sectores=DB::table('projectsector')->get();
        $tipos=DB::table('projecttype')->get();
        $estudiosambiental=DB::table('catambiental')->get();


        return view('admin.projects.sectores',
        [
            'sectores'=>$sectores,
            'tipos'=>$tipos,
            'estudiosambiental'=>$estudiosambiental,
        
        ]);
    }
    public function saveestudioAmbiental(Request $request){

    }

    public function saveprojecttype(Request $request){

        $r=  DB::table('projecttype')->upsert([
            ['titulo' => $request->titulo],
           
        ], ['titulo'], ['titulo']);
        if($r){
            return back()->with('status', '¡Tipo de proyecto registrado!');
        }else{
            return back()->with('status', 'El tipo de proyecto no se pudo registrar');
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
        print_r($_POST);

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
        ->where('id',$request->id_to)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
            return back()->with('status', 'Sector actualizado');
        }else{
            return back()->with('status', 'El sector no pudo actualizarse');
        }
    }
    public function editsubsector(Request $request){
        $r=DB::table('subsector')
        ->where('id',$request->id_to)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
            return back()->with('status', 'Subsector actualizado');
        }else{
            return back()->with('status', 'El subsector no pudo actualizarse');
        }
    }

    public function deletesector(Request $request){
       
        $r=DB::table('sectorsubsector')
        ->where('sectorsubsector.id_sector','=',$request->to_id)
        ->get();

        foreach ($r as $data) {
           DB::table('subsector')
           ->where('id','=',$data->id_subsector)
           ->delete();
        }


        
       $delete= DB::table('projectsector')
        ->where('id','=',$request->to_id)
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
