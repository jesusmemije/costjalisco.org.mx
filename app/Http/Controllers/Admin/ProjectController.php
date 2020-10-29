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
use App\Models\Completion;
use App\Models\Locations;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'tituloProyecto' => 'required',
           
            
        ]);
        return redirect()->route('project.create')->with(['status' => '¡Listo! El proyecto ha sido guardado correctamente']);
        

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

        ]);



      
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
    }
}
