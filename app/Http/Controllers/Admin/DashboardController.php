<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Address;
use App\Models\Completion;
use App\Models\Locations;
=======
>>>>>>> development
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectStatus;
use App\Models\ProjectSector;
<<<<<<< HEAD
use App\Models\Project;
use App\Models\Period;
use App\Models\ProjectType;
use App\Models\Organization;

=======
use App\Models\ProjectType;
use App\Models\Organization;
>>>>>>> development
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

<<<<<<< HEAD
    public function viewProyecto()
    {

      
       
        // $status=DB::table('projectstatus')->select('*')->get();
        $status = ProjectStatus::all();
        $sector = ProjectSector::all();
        $type = ProjectType::all();
        $autoridadPublica = Organization::all();
        return view(
            'admin.proyecto',
            [
                'status' => $status,
                'sectores' => $sector,
                'types' => $type,
                'autoridadP' => $autoridadPublica,
               

            ]
        );
    }

    public function saveP(Request $request)
    {

      
        $fecha_in = date('Y-m-d');


        $period = new Period();
        $period->startDate = $request->fechaInicioProyecto;
        $period->endDate = $request->fechaFinProyecto;
        $period->maxExtentDate = $request->fechaMaxProyecto;
        $period->durationInDays = $request->duracionProyecto;
        $period->save();

        $assetlifetime=new Period();
        $assetlifetime->startDate =$request->assetstart;
        $assetlifetime->endDate = $request->assetend;
        $assetlifetime->maxExtentDate = $request->assetmax;
        $assetlifetime->durationInDays =$request->assetduration;
        $assetlifetime->save();

        $completion=new Completion();
        $completion->endDate=$request->endDate;
        $completion->endDateDetails=$request->endDateDetails;
        $completion->finalValue_amount=$request->finalValue_amount;
        $completion->finalValue_currency='mx';
        $completion->finalValueDetails=$request->finalValueDetails;
        $completion->finalScope=$request->finalScope;
        $completion->finalScopeDetails=$request->finalScopeDetails;
        $completion->save();
     
        $project=new Project();
        $project->ocid='ejem0'.$project->id;
        $project->updated=$fecha_in;
        $project->title=$request->tituloProyecto;
        $project->description=$request->descripcionProyecto;
        $project->status=$request->estatusProyecto;
        $project->period=$period->id;
        $project->sector=$request->sectorProyecto;
        $project->purpose=$request->propositoProyecto;
        $project->type=$request->tipoProyecto;
        $project->assetlifetime=$assetlifetime->id;
        $project->budget_amount=$request->finalValue_amount;
        $project->budget_requestDate=$request->fechaInicioProyecto;
        $project->budget_approvalDate=$request->fechaInicioProyecto;
        $project->publicAuthority_name='derian';
        $project->publicAuthority_id=$request->autoridadP;
        $project->id_completion=$completion->id;

        $project->save();


        $address=new Address();
        $address->streetAddress=$request->streetAddress;
        $address->locality=$request->locality;
        $address->region=$request->region;
        $address->postalCode=$request->postalCode;
        $address->countryName=$request->countryName;
        $address->save();
      

        $locations=new Locations();
        $locations->description=$request->description;
        $locations->id_geometry=1;
        $locations->id_gazetter=1;
        $locations->id_address=$address->id;
        $locations->lat=$request->lat;
        $locations->lng=$request->lng;
        $locations->save();

        DB::table('project_locations')
        ->insertGetId([
            'id_project'=>$project->id,
            'id_location'=>$locations->id
=======
    public function viewProyecto(){

       // $status=DB::table('projectstatus')->select('*')->get();
        $status=ProjectStatus::all();
        $sector=ProjectSector::all();
        $type=ProjectType::all();
        $autoridadPublica=Organization::all();
        return view('admin.proyecto',
        ['status'=>$status,
        'sectores'=>$sector,
        'types'=>$type,
        'autoridadP'=>$autoridadPublica,
        
        ]);
    }

    public function saveP(Request $request){
    
        $fecha_in=date('Y-m-d');

          
    
  
  
      $id_period=DB::table('period')->insertGetId(
          [
          
          'startDate' => $request->fechaInicioProyecto,
          'endDate' => $request->fechaFinProyecto,
          'maxExtentDate'=>$request->fechaMaxProyecto,
          'durationInDays'=>$request->duracionProyecto
          
      ]);
      $assetlifetime=DB::table('period')->insertGetId(
        [
        
        'startDate' => $request->assetstart,
        'endDate' => $request->assetend,
        'maxExtentDate'=>$request->assetmax,
        'durationInDays'=>$request->assetduration
        
    ]);
    $completion=DB::table('completion')->insertGetId(
        [
            'endDate'=>$request->endDate,
            'endDateDetails'=>$request->endDateDetails,
            'finalValue_amount'=>$request->finalValue_amount,
            'finalValue_currency'=>'mx',
            'finalValueDetails'=>$request->finalValueDetails,
            'finalScope'=>$request->finalScope,
            'finalScopeDetails'=>$request->finalScopeDetails,
>>>>>>> development

        ]);


<<<<<<< HEAD

        return redirect()->route('project.create')->with(['message' => '¡Listo! El proyecto ha sido guardado correctamente']);
    }

    public function formwizard()
    {

       
        return view('admin.formwizard');
    }
=======
      $id_project = DB::table('project')->insertGetId(
        ['ocid' => 'ejem01',
        'updated'=>$fecha_in,
        'title'=>$_POST['tituloProyecto'],
        'description'=>$_POST['descripcionProyecto'],
        'status'=>$_POST['estatusProyecto'],
        'period'=>$id_period,
        'sector'=>$_POST['sectorProyecto'],
        'purpose'=>$_POST['propositoProyecto'],
        'type'=>$_POST['tipoProyecto'],
        'assetlifetime'=>$assetlifetime,
        'budget_amount'=>1000,
        'budget_requestDate'=>$request->fechaInicioProyecto,
        'budget_approvalDate'=>$request->fechaInicioProyecto,
        'publicAuthority_name'=>'derian',
        'publicAuthority_id'=>$_POST['autoridadP'],
        'id_completion'=>$completion,




        
        ]
    );
  
           
  
  
      return redirect()->route('project.create')->with(['message'=>'¡Listo! El proyecto ha sido guardado correctamente']);
  



    }

    public function projectStatus(){
       
        

    }

>>>>>>> development
}
