<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function viewProyecto(){

        $status=DB::table('projectstatus')->select('*')->get();

        return view('admin.proyecto',['status'=>$status]);
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


      $id_project = DB::table('project')->insertGetId(
        ['ocid' => 'ejem01',
        'updated'=>$fecha_in,
        'title'=>$_POST['tituloProyecto'],
        'description'=>$_POST['descripcionProyecto'],
        'status'=>$_POST['estatusProyecto'],
        'period'=>$id_period,
        'sector'=>2,
        'purpose'=>$_POST['propositoProyecto'],
        'type'=>2,
        'assetlifetime'=>2,
        'budget_amount'=>1000,
        'budget_requestDate'=>$request->fechaInicioProyecto,
        'budget_approvalDate'=>$request->fechaInicioProyecto,
        'publicAuthority_name'=>'derian',
        'publicAuthority_id'=>2,
        'id_completion'=>1,




        
        ]
    );
  
           
  
  
      return redirect()->route('proyectos.create')->with(['message'=>'¡Listo! El proyecto ha sido guardado correctamente']);
  



    }

}
