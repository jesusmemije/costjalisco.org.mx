<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProjectStatus;
use App\Models\ProjectSector;
use App\Models\ProjectType;
use App\Models\Organization;
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

        ]);


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

}
