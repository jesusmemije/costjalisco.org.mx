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
use App\Models\ProjectLocations;
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
        $projects = Project::orderBy('created_at', 'desc')->get();
      
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
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'tituloProyecto' => 'required',


        ]);



        $fecha_in = date('Y-m-d');


        $period = new Period();
        $period->startDate = $request->fechaInicioProyecto;
        $period->endDate = $request->fechaFinProyecto;
        $period->maxExtentDate = $request->fechaMaxProyecto;
        $period->durationInDays = $request->duracionProyecto;
        $period->save();

        $assetlifetime = new Period();
        $assetlifetime->startDate = $request->assetstart;
        $assetlifetime->endDate = $request->assetend;
        $assetlifetime->maxExtentDate = $request->assetmax;
        $assetlifetime->durationInDays = $request->assetduration;
        $assetlifetime->save();

        $completion = new Completion();
        $completion->endDate = $request->endDate;
        $completion->endDateDetails = $request->endDateDetails;
        $completion->finalValue_amount = $request->finalValue_amount;
        $completion->finalValue_currency = 'mx';
        $completion->finalValueDetails = $request->finalValueDetails;
        $completion->finalScope = $request->finalScope;
        $completion->finalScopeDetails = $request->finalScopeDetails;
        $completion->save();

        $project = new Project();
        $project->ocid = 'ejem0' . $project->id;
        $project->updated = $fecha_in;
        $project->title = $request->tituloProyecto;
        $project->description = $request->descripcionProyecto;
        $project->status = $request->estatusProyecto;
        $project->period = $period->id;
        $project->sector = $request->sectorProyecto;
        $project->purpose = $request->propositoProyecto;
        $project->type = $request->tipoProyecto;
        $project->assetlifetime = $assetlifetime->id;
        $project->budget_amount = $request->finalValue_amount;
        $project->budget_requestDate = $request->fechaInicioProyecto;
        $project->budget_approvalDate = $request->fechaInicioProyecto;
        $project->publicAuthority_name = 'derian';
        $project->publicAuthority_id = $request->autoridadP;
        $project->id_completion = $completion->id;

        $project->save();


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



        // return redirect()->route('project.create')->with(['status' => '¡Listo! El proyecto ha sido guardado correctamente']);


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
    public function testdestroy($id)
    {


        
    }
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
    
        Address::destroy($locations->id_address);
        Period::destroy($project->period);
        Period::destroy($project->assetlifetime);
        Completion::destroy($project->id_completion);
        return back()->with('status', '¡Proyecto eliminado con éxito!');
        }
        else
        {     
            return back()->with('status', '¡Proyecto no encontrado!');
            echo "no data";
        }
      

    }

    public function test()
    {   
        $sectors = ProjectSector::all();
        $autoridadPublica = Organization::all();
        return view('admin.projects.test',['sectors'=>$sectors,'autoridadP'=>$autoridadPublica]);
    }
}
