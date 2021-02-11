<?php

namespace App\Http\Controllers\Admin;


use App\Exports\ProjectDataExport;
use App\Models\ProjectStatus;
use App\Models\ProjectSector;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestIdentificacion;
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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Block\Element\Document;
use Maatwebsite\Excel\Facades\Excel;
use stdClass;
/**Contralador que contiene el CRUD de cada una de las fases de un proyecto, 
 * así como funciones que procesan información relacionada a proyectos.
 * 
 */

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //Se verifica el tipo de usuario.

        $id_user = Auth::user()->role_id;
        //print_r($id_user);
        //1=Admin. Obtiene todos los registros de proyectos sin restricción.
        if($id_user==1){
            $projects = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->leftJoin('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->leftJoin('organization', 'project_organizations.id_organization', '=', 'organization.id')
          //  ->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
            ->join('doproject', 'project.id', '=', 'doproject.id_project')
            //  ->where('doproject.id_user', '=', $id_user)
            ->select(
                'project.*',
                'project.id as id_project',
                'project.updated_at as fechap',
                'organization.name  as orgname',
        //        'proyecto_contratacion.montocontrato as montocontrato',
                'generaldata.*'
            )
            ->get();
        }
        //Agente sectorial
        if($id_user==3){

            $id_organization= Auth::user()->id_organization;
            $projects = DB::table('project')
            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
            ->leftJoin('project_organizations', 'project.id', '=', 'project_organizations.id_project')
            ->leftJoin('organization', 'project_organizations.id_organization', '=', 'organization.id')
            //->leftJoin('proyecto_contratacion', 'project.id', '=', 'proyecto_contratacion.id_project')
            ->join('doproject', 'project.id', '=', 'doproject.id_project')
            ->where('project.publicAuthority_id', '=', $id_organization)
            ->select(
                'project.*',
                'project.id as id_project',
                'project.updated_at as fechap',
                'organization.name  as orgname',
       //         'proyecto_contratacion.montocontrato as montocontrato',
                'generaldata.*'
            )
            ->get();
        }
        /**Esto es sólo para el caso de que no haya proyectos en la posición indicada
         * y para que solo se obtengan los proyectos que un usuario determinado haya subido.
         */
        if (empty($projects[0])) {


            $projects = Project::orderBy('project.created_at', 'desc')
                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                ->join('doproject', 'project.id', '=', 'doproject.id_project')
                ->where('doproject.id_user', '=', $id_user)
                ->select('project.*', 'project.id as id_project', 'organization.name  as orgname')
                ->get();
        }



        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    //Está función no se implemento al final.
    public function create()
    {

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

    /**En todas las llamadas a vistas, se hace uso del parametro o variable
     * 'nav', esta variable contiene el nombre del nav para indicarle en el archivo 
     * 'admin->projects->phasesnav.blade.php' qué nav va estar activo.
     * También se usa la variable 'edit' que permite saber si se trata de una edición o no 
     * y con esto cambiar el nombre del botón de la fase. 
     * Y también se hace uso de la variable 'ruta', que como en el caso anterior, guarda
     * la ruta que irá en el action del formulario para saber si se hará una actualización o un nuevo
     * registro.
     */

    //CRUD de la fase 'datos generales'.
    public function generaldata($id = null)
    {

        //Sólo si se pasa un ID a dicha vista.
        if ($id != null) {


            $generaldata = DB::table('generaldata')
                ->where('id_project', '=', $id)
                ->first();
            //Busca el proyecto, si existe, se mandan los datos de dicho proyecto para su edición.
            $project=Project::find($id);
            if($project!=null){
                return view('admin.projects.generaldata', [
                    'project' => Project::find($id),
                    'nav' => 'generaldata',
                    'edit' => true,
                    'ruta' => 'project.updategeneraldata',
                    'generaldata' => $generaldata,
                ]);
            }

         
        } else {
            //Si no se pasa ningún id entonces se manda a la creación de uno nuevo.
            /** Se genera una nueva clase stdClass para que no genere error la vista.
             * Ya que se comparte la misma vista tanto cuando se va registrar nueva información
             * así como cuando se va editar.
             */
            $generaldata = new stdClass();
            $generaldata->id_project = '';
            $generaldata->descripcion = '';
            $generaldata->responsable = '';
            $generaldata->email = '';
            $generaldata->organismo = '';
            $generaldata->puesto = '';
            $generaldata->involucrado = '';
            $generaldata->video='';
            $generaldata->observaciones='';
            return view('admin.projects.generaldata', [
                'project' => new Project(),
                'nav' => 'generaldata',
                'edit' => false,
                'ruta' => 'project.savegeneraldata',
                'generaldata' => $generaldata,
            ]);
        }
    }
    public function savegeneraldata(Request $request)
    {
        //Se crea un nuevo proyecto(basado en el modelo 'Project').
        $project = new Project();

        $request->validate([

            'nombreresponsable' => 'required',
            'email' => 'required',
            'organismo' => 'required',
            'puesto' => 'required',
            'involucrado' => 'required',
        ]);

        //El estaus se guarda en 7 para indicar que se encuentra en la primera fase el proyecto...
        $project->status = 7;
        /*Esta validación es para el caso de 'Agente multisectorial' ya que 
        este tipo de usario se asocia a una organización, entonces la autoridad pública 
        será la que tenga este usuario.
        */
        if(Auth::user()->id_organization!=""){
            $project->publicAuthority_id=Auth::user()->id_organization;
        }
       
        $project->save();


        //Se guardan las imagenes del proyecto.
        if ($request->hasFile('images')) {

            for ($i = 0; $i < sizeof($request->images); $i++) {
                $nombre_img = $_FILES['images']['name'][$i];
                $url = time() . $nombre_img;
                move_uploaded_file($_FILES['images']['tmp_name'][$i], 'projects_imgs/' . $url);


                DB::table('projects_imgs')->insert([
                    'id_project' => $project->id,
                    'imgroute' => $url,
                ]);
            }
        }
        //Se guarda la información de datos generales.
        $r = DB::table('generaldata')
            ->insert([
                'id_project' => $project->id,
                'descripcion' => $request->descripcion,
                'responsable' => $request->nombreresponsable,
                'email' => $request->email,
                'organismo' => $request->organismo,
                'puesto' => $request->puesto,
                'involucrado' => $request->involucrado,
                'video'=>$request->video,
                'observaciones'=>$request->observaciones,

            ]);
        //Se guarda la información del usuario que está registrando el proyecto.
        DB::table('doproject')
            ->insert([
                'id_project' => $project->id,
                'id_user' => Auth::user()->id,
            ]);

        return redirect()->route('project.editidentificacion', ['project' => $project->id]);
    }
    //Función que permite eliminar las imagenes previamente subidas de un proyecto.
    public function delimgproject($id_project){
        $projects_imgs = DB::table('projects_imgs')
                ->where('id_project', '=', $id_project)
                ->get();


            foreach ($projects_imgs as $project_img) {
                $ruta = 'projects_imgs/' . $project_img->imgroute;
                if (file_exists(($ruta))) { 
                    unlink($ruta);
                }
            }
       DB::table('projects_imgs')->where('id_project', '=', $id_project)->delete();
       return back()->with('status', '¡Las imágenes del proyecto se eliminaron correctamente!');

    }
    public function updategeneraldata(Request $request)
    {
    

        $request->validate([

            'nombreresponsable' => 'required',
            'email' => 'required',
            'organismo' => 'required',
            'puesto' => 'required',
            'involucrado' => 'required',
        ]);

        if ($request->hasFile('images')) {

            for ($i = 0; $i < sizeof($request->images); $i++) {
                $nombre_img = $_FILES['images']['name'][$i];
                $url = time() . $nombre_img;
                move_uploaded_file($_FILES['images']['tmp_name'][$i], 'projects_imgs/' . $url);


                DB::table('projects_imgs')->insert([
                    'id_project' => $request->id_project,
                    'imgroute' => $url,
                ]);
            }
        }

        $r = DB::table('generaldata')
            ->where('id_project', $request->id_project)
            ->update([
                'descripcion' => $request->descripcion,
                'responsable' => $request->nombreresponsable,
                'email' => $request->email,
                'organismo' => $request->organismo,
                'puesto' => $request->puesto,
                'involucrado' => $request->involucrado,
                'video'=>$request->video,
                'observaciones'=>$request->observaciones,

            ]);


        return back()->with('status', '¡Los datos generales han sido actualizados correctamente!');
    }

    /** Vista para registrar o editar los datos de  identificación */

    public function identificacion($id = null)
    {

      
        $project = Project::find($id);



        if (!empty($project)) {


            $sectors = ProjectSector::orderBy('titulo', 'asc')->get();
            $types = ProjectType::orderBy('titulo', 'asc')->get();

            $autoridadPublica = Organization::orderBy('name', 'asc')->get();
            $documentstype = DocumentType::orderBy('titulo', 'asc')->get();

            if ($project->title == "") {



                return view(
                    'admin.projects.identificacion',
                    [
                        'project' => $project,
                        'nav' => 'identificacion',
                        'documentstype' => $documentstype,
                        'sectors' => $sectors,
                        'autoridadP' => $autoridadPublica,
                        'types' => $types,
                        'edit' => false,
                        'ruta' => 'project.saveidentificacion',


                    ]
                );
            } else {

                $documents = DB::table('project')
                    ->join('project_documents', 'project.id', '=', 'project_documents.id_project')
                    ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                    ->where('project.id', '=', $id)
                    ->where('documents.description', '=', 'identificacion')
                    ->select('documents.url', 'documents.id','documents.documentType')
                    ->get();

                $data_project = DB::table('project')
                    ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                    ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->leftJoin('responsableproyecto', 'project.id', '=', 'responsableproyecto.id_project')
                    ->select(
                        'project.*',
                        'project.description as descripcionProyecto',
                        'locations.lat',
                        'locations.lng',
                        'locations.description as description',
                        'address.streetAddress',
                        'address.locality',
                        'address.suburb',
                        'address.region',
                        'address.state',
                        'address.postalCode',
                        'address.countryName',
                        'responsableproyecto.nombreresponsable',
                        'responsableproyecto.cargoresponsable',
                        'responsableproyecto.telefonoresponsable',
                        'responsableproyecto.correoresponsable',
                        'responsableproyecto.domicilioresponsable',
                        'responsableproyecto.horarioresponsable'
                    )
                    ->where('project.id', '=', $id)
                    ->first();



                return view(
                    'admin.projects.identificacion',
                    [
                        'project' => $data_project,

                        'documentstype' => $documentstype,
                        'documents' => $documents,
                        'nav' => 'identificacion',
                        'sectors' => $sectors,
                        'autoridadP' => $autoridadPublica,
                        'types' => $types,
                        'edit' => true,
                        'ruta' => 'project.updateidentificacion',



                    ]
                );
            }
        
    }else{
        return redirect()->route('project.generaldata');
    }
    }
    
    /** Vista para registrar o editar los datos de  preparacion */
    public function preparacion($id = null)
    {


        if (!empty($id)) {


            $catfac = DB::table('catfac')->orderBy('titulo', 'asc')->get();
            $catambiental = DB::table('catambiental')->orderBy('titulo', 'asc')->get();
            $catimpacto = DB::table('catimpactoterreno')->orderBy('titulo', 'asc')->get();
            $catorigenrecurso = DB::table('catorigenrecurso')->orderBy('titulo', 'asc')->get();
            $documentstype = DocumentType::orderBy('titulo', 'asc')->get();
            $documents = DB::table('project')
                ->join('project_documents', 'project.id', '=', 'project_documents.id_project')
                ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                ->where('project.id', '=', $id)
                ->wherE('documents.description', '=', 'preparacion')
                ->select('documents.url', 'documents.id','documents.documentType')
                ->get();


     
            $project = DB::table('project')
               
                ->where('project.id', '=', $id)
                ->first(); 


            $ambiental = DB::table('project')
                ->join('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
                ->where('project.id', '=', $id)
                ->get(); 

            $observaciones=DB::table('preparacionobservacion')
            ->where('id_project','=',$id)
            ->get();
 

            $factibilidad= DB::table('project')
            ->join('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
            ->where('project.id', '=', $id)
            ->get(); 

            $impacto= DB::table('project')
            ->join('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
            ->where('project.id', '=', $id)
            ->get(); 

           $origen_recurso=DB::table('project')
           ->join('project_budgetbreakdown', 'project.id', '=', 'project_budgetbreakdown.id_project')
            ->join('budget_breakdown', 'project_budgetbreakdown.id_budget', '=', 'budget_breakdown.id')
            ->join('period', 'budget_breakdown.id_period', '=', 'period.id')
           ->where('project.id', '=', $id)
           ->select(
            'budget_breakdown.id as id_recurso',
           'budget_breakdown.description',
           'budget_breakdown.sourceParty_name',
           'period.startDate as iniciopresupuesto'
           )
           ->get(); 
           $project = Project::find($id);
           $medit = false;
           //$project->observaciones="";
           if ($project == null) {
               return redirect()->route('project.identificacion');
           }
           
           if($project->status>=1 && $project->status!=7){

         

           return view(
            'admin.projects.preparacion_update',
            [
                'project' => $project,
                'ambiental'=>$ambiental,
                'factibilidad'=>$factibilidad,
                'impactos'=>$impacto,
                'origen_recurso'=>$origen_recurso,
                'nav' => 'preparacion',
                'documents' => $documents,
                'catfacs' => $catfac,
                'catambientals' => $catambiental,
                'catimpactos' => $catimpacto,
                'catorigenrecurso' => $catorigenrecurso,
                'edit' => true,
                'medit' => $medit,
                'ruta' => 'project.updatepreparacion',
                'documentstype'=>$documentstype,
                'observaciones'=>$observaciones,


            ]
        );
    }else{
       
        return redirect()->route('project.identificacion', ['project' => $id]);
    }
          
            
        } else {
            return redirect()->route('project.identificacion');
        }
    }

    /**Función que guarda los datos de un nuevo estudio ambiental */

    /**Cuando se guarda un nuevo estudio por defecto se da por entendio que 
     * la fase/estatus del proyecto cambia.
     */

    public function guardarAmbiental(Request $request){
        $fecha_in = date('Y-m-d');
        $request->validate([
            'tipoAmbiental' => 'required',
            'fecharealizacionAmbiental' => 'required|max:50',
            'responsableAmbiental' => 'required|max:255',
            'numeros_ambiental' => 'required',
]);


        DB::table('estudiosambiental')->insert([
            'id_project' => $request->id_project,
            'descripcionAmbiental' => $request->descripcionAmbiental,
            'tipoAmbiental' => $request->tipoAmbiental,
            'fecharealizacionAmbiental' => $request->fecharealizacionAmbiental,
            'responsableAmbiental' => $request->responsableAmbiental,
            'numeros_ambiental' => $request->numeros_ambiental,
            'observaciones'=>$request->observaciones,
        ]);

        $project=Project::find($request->id_project);
        if($project->status<=1){
            DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 2]);
        }

      

        return back()->with('status', '¡Nuevo estudio guardado correctamente!');
    }
     /**Función que guarda los datos de un nuevo estudio de factibilidad */
    public function guardarFactibilidad(Request $request){
        $request->validate([
            

            'tipoFactibilidad' => 'required',
            'fecharealizacionFactibilidad' => 'required|max:50',
            'responsableFactibilidad' => 'required|max:255',
            'numeros_factibilidad' => 'required',

          

        ]);
        DB::table('estudiosfactibilidad')->insert([
            'id_project' => $request->id_project,
            'descripcionFactibilidad' => $request->descripcionFactibilidad,
            'tipoFactibilidad' => $request->tipoFactibilidad,
            'fecharealizacionFactibilidad' => $request->fecharealizacionFactibilidad,
            'responsableFactibilidad' => $request->responsableFactibilidad,
            'numeros_factibilidad' => $request->numeros_factibilidad,
        ]);
        DB::table('project')
        ->where('id', $request->id_project)
        ->update(['status' => 2]);
        return back()->with('status', '¡Nuevo estudio guardado correctamente!');

    }
     /**Función que guarda los datos de un nuevo estudio de impacto */
    public function guardarImpacto(Request $request){

        $request->validate([
          

            'tipoImpacto' => 'required',
            'fecharealizacionImpacto' => 'required|max:50',
            'responsableImpacto' => 'required|max:255',
            'numeros_impacto' => 'required',


        ]);
        DB::table('estudiosimpacto')->insert([
            'id_project' => $request->id_project,
            'descripcionImpacto' => $request->descripcionImpacto,
            'tipoImpacto' => $request->tipoImpacto,
            'fecharealizacionImpacto' => $request->fecharealizacionImpacto,
            'responsableImpacto' => $request->responsableImpacto,
            'numeros_impacto' => $request->numeros_impacto,
        ]);
        DB::table('project')
        ->where('id', $request->id_project)
        ->update(['status' => 2]);
        return back()->with('status', '¡Nuevo estudio guardado correctamente!');
    }
     /**Función que guarda los datos de un nuevo origen del recurso. */
    public function guardarRecurso(Request $request){
        $request->validate([
            

            'origenrecurso' => 'required',
            'fuenterecurso' => 'required|max:255',
            'fecharecurso' => 'required|max:50'

        ]);
        $presupuesto = new BudgetBreakdown();
        $presupuesto->description = $request->origenrecurso;
        $presupuesto->sourceParty_name = $request->fuenterecurso;


        $period = new Period();
        $period->startDate = $request->fecharecurso;
        $period->save();

        $presupuesto->id_period = $period->id;
        $presupuesto->save();

        DB::table('project_budgetbreakdown')
            ->insert([

                'id_project' => $request->id_project,
                'id_budget' => $presupuesto->id,
            ]);

            DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 2]);
            return back()->with('status', '¡Nuevo recurso guardado correctamente!');
    }
 /**Funciones que editan los estudios de la fase de "Preparación" */
    public function editarAmbiental(Request $request){
      
    
        if(empty($request->tipomodalAmbiental)){
            DB::table('estudiosambiental')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'fecharealizacionAmbiental'=>$request->fechamodalAmbiental,
                'responsableAmbiental'=>$request->responsablemodalAmbiental,
                'numeros_ambiental'=>$request->numerosmodal_ambiental,
               
                ]);

        }else{
            DB::table('estudiosambiental')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'tipoAmbiental'=>$request->tipomodalAmbiental,
                'fecharealizacionAmbiental'=>$request->fechamodalAmbiental,
                'responsableAmbiental'=>$request->responsablemodalAmbiental,
                'numeros_ambiental'=>$request->numerosmodal_ambiental,
               
                ]);
        }
        return back()->with('status', '¡Estudio actualizado correctamente!');
    }
    public function editarFactibilidad(Request $request){
    
        if(empty($request->tipomodalFactibilidad)){
            DB::table('estudiosfactibilidad')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'fecharealizacionFactibilidad'=>$request->fechamodalFactibilidad,
                'responsableFactibilidad'=>$request->responsablemodalFactibilidad,
                'numeros_factibilidad'=>$request->numerosmodal_factibilidad,
               
                ]);

        }else{
            DB::table('estudiosfactibilidad')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'tipoAmbiental'=>$request->tipomodalAmbiental,
                'fecharealizacionFactibilidad'=>$request->fechamodalFactibilidad,
                'responsableFactibilidad'=>$request->responsablemodalFactibilidad,
                'numeros_factibilidad'=>$request->numerosmodal_factibilidad,
               
                ]);
        }
        return back()->with('status', '¡Estudio actualizado correctamente!');
        
    }
    public function editarImpacto(Request $request){
   
        if(empty($request->tipomodalImpacto)){
            DB::table('estudiosimpacto')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'fecharealizacionimpacto'=>$request->fechamodalImpacto,
                'responsableImpacto'=>$request->responsablemodalImpacto,
                'numeros_impacto'=>$request->numerosmodal_impacto,
               
                ]);

        }else{
            DB::table('estudiosimpacto')
            ->where('id', '=', $request->id_estudio)
            ->update([
                'tipoImpacto'=>$request->tipomodalImpacto,
                'fecharealizacionimpacto'=>$request->fechamodalImpacto,
                'responsableImpacto'=>$request->responsablemodalImpacto,
                'numeros_impacto'=>$request->numerosmodal_impacto,
               
                ]);
        }
        return back()->with('status', '¡Estudio actualizado correctamente!');
        
    }
    public function editarRecurso(Request $request){
    
        $period=DB::table('budget_breakdown')
        ->where('id', '=', $request->id_recurso)
        ->first();
        $period=$period->id_period;

        $perdiod=DB::table('period')
        ->where('id','=',$period)
        ->update(['startDate'=>$request->fecharecursomodal]);

    

       if(empty($request->origenrecursomodal)){
        DB::table('budget_breakdown')
        ->where('id', '=', $request->id_recurso)
        ->update([
            'sourceParty_name'=>$request->fuenterecursomodal,
           
            ]);
       }else{
        DB::table('budget_breakdown')
        ->where('id', '=', $request->id_recurso)
        ->update([
            'description'=>$request->origenrecursomodal,
            'sourceParty_name'=>$request->fuenterecursomodal,
           
            ]);
       }
       return back()->with('status', 'Origen del recurso actualizado correctamente!');
    }
     /**Fin de las funciones que editan los estudios de la fase de "Preparación" */
    
     /**Funcion que elimina los estudios de la fase de "Preparación" */
    public function eliminarEstudio(Request $request){


        switch($request->caso){

            case 'ambiental':
                DB::table('estudiosambiental')->where('id', '=', $request->id_eliminar)->delete();
                break;
            case 'factibilidad':
                DB::table('estudiosfactibilidad')->where('id', '=', $request->id_eliminar)->delete();
                break;
            case 'impacto':
                DB::table('estudiosimpacto')->where('id', '=', $request->id_eliminar)->delete();
                break;
            case 'recurso':
                DB::table('budget_breakdown')->where('id', '=', $request->id_eliminar)->delete();
                break;
        }
        return back()->with('status', '¡Registro eliminado correctamente!');

    }
    /**Función que guarda los documentos de la fase de preparación 
     * y hace uso de la función 'havedocuments' propias del controlador.
     */
    public function guardarDocumentosPreparacion(Request $request){
        ProjectController::havedocuments($request, 'preparacion');
        return back()->with('status', '¡Los documentos han sido guardados correctamente!');
    }
    /*Función que actualiza las observaciones de la fase de preparación*/
    public function actualizarObservacionPreparacion(Request $request){
        
    
      DB::table('preparacionobservacion')     
      ->updateOrInsert(
        ['id_project' =>$request->id_project],
        ['observaciones'=>$request->observaciones]
    );

    return back()->with('status', '¡Las observaciones han sido actualizadas!');
    }
    /**Función que registra o edita la fase de contratación */
    public function contratacion($id = null)
    {
        if (empty($id)) {
            return redirect()->route('project.identificacion');
        } else {
            
            $check=Project::find($id);
       
            if($check!=null){
                if($check->status>=2 && $check->status!=7){
                    
                   
                    $documents = DB::table('project')
                    ->join('project_documents', 'project.id', '=', 'project_documents.id_project')
                    ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                    ->where('project.id', '=', $id)
                    ->where('documents.description', '=', 'contratacion')
                    ->select('documents.url', 'documents.id','documents.documentType')
                    ->get();
    
                    $documentstype = DocumentType::orderBy('titulo', 'asc')->get();
                    
                    $contratos = DB::table('proyecto_contratacion')
                    ->join('project', 'proyecto_contratacion.id_project', '=', 'project.id')
                    ->select('proyecto_contratacion.*')
                    ->where('id_project', '=', $id)
                    ->get();
    
                $catmodalidad_adjudicacion = DB::table('catmodalidad_adjudicacion')->orderBy('titulo','asc')->get();
                $cattipo_contrato = DB::table('cattipo_contrato')->orderBy('titulo','asc')->get();
                $catmodalidad_contratacion = DB::table('catmodalidad_contratacion')->orderBy('titulo','asc')->get();
                $contractingprocess_status = DB::table('contractingprocess_status')->orderBy('titulo','asc')->get();
    
          
    
                if (sizeof($contratos)==0) {
    
                    $project=Project::find($id);
                 
                    if($project==null){
                        return redirect()->route('project.preparacion', ['project' => $id]);
                    }
                    $project->observaciones="";
                    return view(
                        'admin.projects.contratacion',
                        [
                            'project' => $project,
                            'nav' => 'contratacion',
                            'contratos'=>$contratos,
                            'documents' => $documents,
                            'edit' => true,
                            'catmodalidad_adjudicacion' => $catmodalidad_adjudicacion,
                            'cattipo_contrato' => $cattipo_contrato,
                            'catmodalidad_contratacion' => $catmodalidad_contratacion,
                            'contractingprocess_status' => $contractingprocess_status,
                            'medit' => false,
                            'ruta' => 'project.savecontratacion',
                            'documentstype'=>$documentstype,
    
    
                        ]
                    );
                } else {
                    $project=Project::find($id); 
                    return view(
                        'admin.projects.contratacion',
                        [
                            'project' => $project,
                            'contratos'=>$contratos,
                            'nav' => 'contratacion',
                            'documents' => $documents,
                            'edit' => true,
                            'catmodalidad_adjudicacion' => $catmodalidad_adjudicacion,
                            'cattipo_contrato' => $cattipo_contrato,
                            'catmodalidad_contratacion' => $catmodalidad_contratacion,
                            'contractingprocess_status' => $contractingprocess_status,
                            'medit' => true,
                            //'ruta' => 'project.updatecontratacion',
                            'ruta' => 'project.savecontratacion',
                            'documentstype'=>$documentstype,
    
                        ]
                    );
                }
                }else{
                    return redirect()->route('project.preparacion', ['project' => $id]);
              

                }
            }
            
        
          
        }
    }
 /**Función que registra o edita la fase de ejecución */
    public function ejecucion($id = null)
    {

        if (!empty($id)) {

            $contratos = DB::table('proyecto_contratacion')
            ->join('project', 'proyecto_contratacion.id_project', '=', 'project.id')
            ->select('proyecto_contratacion.id')
            ->where('id_project', '=', $id)
            ->get();

            $ejecuciones = DB::table('proyecto_ejecucion')
                ->join('project', 'proyecto_ejecucion.id_project', '=', 'project.id')
                ->select('proyecto_ejecucion.*', 'project.status', 'project.id as id')
                ->where('id_project', '=', $id)
                ->get();


            
              
    
            $documents = DB::table('project')
                ->join('project_documents', 'project.id', '=', 'project_documents.id_project')
                ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                ->where('project.id', '=', $id)
                ->wherE('documents.description', '=', 'ejecucion')
                ->select('documents.url', 'documents.id','documents.documentType')
                ->get();
                $documentstype = DocumentType::orderBy('titulo', 'asc')->get();
            if (sizeof($ejecuciones)==0) {

                $project = Project::find($id);
                $project->observaciones="";

                if ($project == null) {
                    return redirect()->route('project.contratacion', ['project' => $id]);
                } else {
                    if ($project->status <3 || $project->status==7) {
                        return redirect()->route('project.contratacion', ['project' => $id]);
                    }
                 

                    return view(
                        'admin.projects.ejecucion',
                        [
                            'project' => $project,
                            'documents' => $documents,
                            'nav' => 'ejecucion',
                            'contratos'=>$contratos,
                            'edit' => true,
                            'medit' => false,
                            'documentstype'=>$documentstype,

                        ]
                    );
                }
            } else {
                $project = Project::find($id);
                return view(
                    'admin.projects.ejecucion',
                    [
                        'project' => $project,
                        'ejecuciones'=>$ejecuciones,
                        'documents' => $documents,
                        'contratos'=>$contratos,
                        'nav' => 'ejecucion',
                        'edit' => true,
                        'medit' => true,
                        'documentstype'=>$documentstype,

                    ]
                );
            }
        }
    }
     /**Función que registra o edita la fase de finalización */
    public function finalizacion($id = null)
    {
        if ($id != null) {

            $project = DB::table('proyecto_finalizacion')
                ->join('project', 'proyecto_finalizacion.id_project', '=', 'project.id')
                ->select('proyecto_finalizacion.*', 'project.status', 'project.id as id')
                ->where('id_project', '=', $id)
                ->first();
            $documents = DB::table('project')
                ->join('project_documents', 'project.id', '=', 'project_documents.id_project')
                ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                ->where('project.id', '=', $id)
                ->wherE('documents.description', '=', 'finalizacion')
                ->select('documents.url', 'documents.id','documents.documentType')
                ->get();
                $documentstype = DocumentType::orderBy('titulo', 'asc')->get();

            if ($project == null) {


                $project = Project::find($id);

                $project->observaciones="";




                if ($project == null) {
                    return redirect()->route('project.ejecucion', ['project' => $id]);
                } else {
                    if ($project->status != 4) {
                        return redirect()->route('project.ejecucion', ['project' => $id]);
                    }
                    return view(
                        'admin.projects.finalizacion',
                        [
                            'project' => $project,
                            'documents' => $documents,
                            'nav' => 'finalizacion',
                            'edit' => true,
                            'medit' => false,
                            'ruta' => 'project.savefinalizacion',
                            'documentstype'=>$documentstype,

                        ]
                    );
                }
            } else {



                return view(
                    'admin.projects.finalizacion',
                    [
                        'project' => $project,
                        'documents' => $documents,
                        'nav' => 'finalizacion',
                        'edit' => true,
                        'medit' => true,
                        'ruta' => 'project.updatefinalizacion',
                        'documentstype'=>$documentstype,

                    ]
                );
            }
        }
    }
    /*Función que procesa la solicitud de 'no aplica' en la fase preparación.
    Lo que hace es actualizar el estatus del proyecto para avanzar a la siguiente fase.
    Si ya hay un registro, el estatus no se actualiza y solo manda al usaurio a la siguiente fase.
    */
    public function noaplica($id_project){

        //si el status es 1 

        $project=Project::find($id_project);

        if($project->status==1){
            DB::table('project')
            ->where('id',$id_project)
            ->update(['status' => 2]);

            return redirect()->route('project.contratacion', [
                'project' => $id_project,
            ]);
        }else{
            return redirect()->route('project.contratacion', [
                'project' => $id_project,
            ]);
        }  
    }

    public function siguientecontratacion(Request $request){

        $project=Project::find($request->id_project);

        if($project->status<=2){
            DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 3]);
            return redirect()->route('project.ejecucion', [
                'project' => $request->id_project,
            ]);
        }else{
            return redirect()->route('project.ejecucion', [
                'project' => $request->id_project,
            ]);
        }

       

    }
    public function siguientejecucion(Request $request){

        $project=Project::find($request->id_project);

        if($project->status<=3){
            DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 4]);
            return redirect()->route('project.finalizacion', [
                'project' => $request->id_project,
            ]);
        }else{
            return redirect()->route('project.finalizacion', [
                'project' => $request->id_project,
            ]);
        }

       

    }
    /*Función que actualiza los registros de la fase de identificación*/
    public function updateidentificacion(Request $request)
    {

        $request->validate([
            'people' => 'required|max:11',
            'porcentaje_obra' => 'required|max:11',
            'telefonoresponsable'=>'max:20',
        ]);

        $fecha_in = date('Y-m-d');


        $project = Project::find($request->id_project);



        $project->updated = $fecha_in;
        $project->title = $request->tituloProyecto;
        $project->ocid = $request->ocid;
        $project->description = $request->descripcionProyecto;


        $project->sector = $request->sectorProyecto;
        $project->subsector = $request->subsector;
        $project->purpose = $request->propositoProyecto;
        $project->type = $request->tipoProyecto;
        $project->people = $request->people;
        $project->porcentaje_obra = $request->porcentaje_obra;

        $project->publicAuthority_name = '';
        $project->publicAuthority_id = $request->autoridadP;
        $project->observaciones=$request->observaciones;






        $project_location = DB::table('project_locations')
            ->select('id_location')
            ->where('id_project', '=', $project->id)
            ->first();



        $locations = Locations::find($project_location->id_location);


        $locations->description = $request->description;
        $locations->id_geometry = 1;
        $locations->id_gazetter = 1;
        $locations->principal = $request->principal;
        $locations->names = $request->names;
        $locations->lat = $request->lat;
        $locations->lng = $request->lng;


        $address = Address::find($locations->id_address);
        $address->streetAddress = $request->streetAddress;
        $address->locality = $request->locality;
        $address->region = $request->region;
        $address->postalCode = $request->postalCode;
        $address->countryName = $request->countryName;

        $address->suburb=$request->suburb;
        $address->state=$request->state;


      



        $address->save();
        $locations->save();
        $project->save();


        //responsable del proyecto.

        DB::table('responsableproyecto')
            ->where('id_project', '=', $request->id_project)
            ->update([
                'nombreresponsable' => $request->nombreresponsable,
                'cargoresponsable' => $request->cargoresponsable,
                'telefonoresponsable' => $request->telefonoresponsable,
                'correoresponsable' => $request->correoresponsable,
                'domicilioresponsable' => $request->domicilioresponsable,
                'horarioresponsable' => $request->horarioresponsable,

            ]);

        if (!empty($request->docfase1)) {



            for ($i = 0; $i < sizeof($request->docfase1); $i++) {
                $nombre_img = $_FILES['docfase1']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);
                move_uploaded_file($_FILES['docfase1']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;




                $documents = new Documents();
                $documents->documentType = $request->documenttype;
                $documents->description = "identificacion";
                $documents->url = $url;
                $documents->save();

                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $project->id;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
        }



        return back()->with('status', '¡La fase de identificación ha sido actualizada correctamente!');
    }

    /*Función que actualiza los registros de la fase de preparacion*/
    public function updatepreparacion(Request $request)
    {
        $fecha_in = date('Y-m-d');

        $request->validate([
            'tipoAmbiental' => 'required',
            'fecharealizacionAmbiental' => 'required|max:50',
            'responsableAmbiental' => 'required|max:255',
            'numeros_ambiental' => 'required',

            'tipoFactibilidad' => 'required',
            'fecharealizacionFactibilidad' => 'required|max:50',
            'responsableFactibilidad' => 'required|max:255',
            'numeros_factibilidad' => 'required',

            'tipoImpacto' => 'required',
            'fecharealizacionImpacto' => 'required|max:50',
            'responsableImpacto' => 'required|max:255',
            'numeros_impacto' => 'required',

            'origenrecurso' => 'required',
            'fuenterecurso' => 'required|max:255',
            'fecharecurso' => 'required|max:50'

        ]);

  


        DB::table('estudiosambiental')
            ->where('id_project', '=', $request->id_project)
            ->update([
                'id_project' => $request->id_project,
                'descripcionAmbiental' => $request->descripcionAmbiental,
                'tipoAmbiental' => $request->tipoAmbiental,
                'fecharealizacionAmbiental' => $request->fecharealizacionAmbiental,
                'responsableAmbiental' => $request->responsableAmbiental,
                'numeros_ambiental' => $request->numeros_ambiental,
                'observaciones'=>$request->observaciones,
            ]);

        DB::table('estudiosfactibilidad')
            ->where('id_project', '=', $request->id_project)
            ->update([
                'id_project' => $request->id_project,
                'descripcionFactibilidad' => $request->descripcionFactibilidad,
                'tipoFactibilidad' => $request->tipoFactibilidad,
                'fecharealizacionFactibilidad' => $request->fecharealizacionFactibilidad,
                'responsableFactibilidad' => $request->responsableFactibilidad,
                'numeros_factibilidad' => $request->numeros_factibilidad,
            ]);
        DB::table('estudiosimpacto')
            ->where('id_project', '=', $request->id_project)
            ->update([
                'id_project' => $request->id_project,
                'descripcionImpacto' => $request->descripcionImpacto,
                'tipoImpacto' => $request->tipoImpacto,
                'fecharealizacionImpacto' => $request->fecharealizacionImpacto,
                'responsableImpacto' => $request->responsableImpacto,
                'numeros_impacto' => $request->numeros_impacto,
            ]);



        $project_budget = DB::table('project_budgetbreakdown')
            ->where('id_project', '=', $request->id_project)
            ->first();




        $presupuesto = BudgetBreakdown::find($project_budget->id_budget);
        $presupuesto->description = $request->origenrecurso;
        $presupuesto->sourceParty_name = $request->fuenterecurso;


        $period = Period::find($presupuesto->id_period);
        $period->startDate = $request->fecharecurso;


        $period->save();
        $presupuesto->save();

        //Guardar el documento y la relación con su proyecto.
        ProjectController::havedocuments($request, 'preparacion');



        return back()->with('status', '¡La fase de preparación ha sido actualizada correctamente!');
    }
    public function agregarArchivoContrato(Request $request){

      

        if (!empty($request->documentsupdate)) {

            $request->validate([
                'documenttypeupdate'=>'required',
            ]);
    
    
            for ($i = 0; $i < sizeof($request->documentsupdate); $i++) {
                $nombre_img = $_FILES['documentsupdate']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);
                move_uploaded_file($_FILES['documentsupdate']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;
    
    
       
    
                $documents = new Documents();
                $documents->documentType = $request->documenttypeupdate;
                $documents->description = 'contratacion';
                $documents->url = $url;
                $documents->save();
    
                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $request->id_project;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
            //update
          
          
            DB::table('contract_documents')
            ->insert(
                [
                    'id_contrato'=>$request->id_contrato,
                    'id_document'=>$documents->id
                ]);
                return back()->with('status', '¡Documento agregado al contrato correctamente!');
        }
    }
     /*Función que actualiza los registros de la fase de contratación*/
    public function updatecontratacion(Request $request)
    {   
      
        $request->validate([

            'telefonocontactou'=>'max:10',
            'montocontratou'=>'max:20',
        ]);

        if (!empty($request->fechapublicacion)) {
            $request->validate([

                'fechapublicacionu' => 'date|before:fechapresentacionpropuestau',
                'fechapresentacionpropuestau' => 'date|before:fechainiciocontratou|after:fechapublicacionu',
                'fechainiciocontratou' => 'date|after:fechapresentacionpropuestau|after:fechapublicacionu',

            ]);
        }


        $procedimiento_contratacion = DB::table('proyecto_contratacion')
            ->where('id', '=', $request->id_contrato)
            ->update([
               
                'descripcion' => $request->descripcion,
                'fechapublicacion' => $request->fechapublicacionu,

                'entidadadjudicacion' => $request->entidadadjudicacion,
                //'datosdecontacto' => $request->datosdecontacto,
                'nombrecontacto'=>$request->nombrecontacto,
                'emailcontacto'=>$request->emailcontacto,
                'telefonocontacto'=>$request->telefonocontactou,
                'domiciliocontacto'=>$request->domiciliocontacto,
                'nombreresponsable' => $request->nombreresponsable,
                'modalidadadjudicacion' => $request->modalidadadjudicacion,
                'tipocontrato' => $request->tipocontrato,
                'modalidadcontrato' => $request->modalidadcontrato,
                'estadoactual' => $request->estadoactual,
                'empresasparticipantes' => $request->empresasparticipantes,
                'entidad_admin_contrato' => $request->entidad_admin_contrato,
                'titulocontrato' => $request->titulocontrato,
                'empresacontratada' => $request->empresacontratada,
                'viapropuesta' => $request->viapropuesta,
                'fechapresentacionpropuesta' => $request->fechapresentacionpropuestau,
                'montocontrato' => $request->montocontratou,
                'alcancecontrato' => $request->alcancecontrato,
                'fechainiciocontrato' => $request->fechainiciocontratou,
                'duracionproyecto_contrato' => $request->duracionproyecto_contrato,
                'observaciones'=>$request->observaciones,


            ]);


       // ProjectController::havedocuments($request, 'contratacion');


 


        if ($procedimiento_contratacion) {
            return back()->with('status', '¡La fase de contratación ha sido actualizada correctamente!');
        } else {
            return back()->with('status', 'La información no ha podido ser registrada');
        }
    }
/**Fución que elimina un contrato(id) de la fase de contratacion */

public function deletecontrato(Request $request){

    $project_documents = DB::table('contract_documents')
    ->join('documents', 'contract_documents.id_document', '=', 'documents.id')
    ->where('contract_documents.id_contrato', '=', $request->eliminarcontrato)
    ->get();


foreach ($project_documents as $document) {

    Documents::destroy($document->id);
    $ruta = public_path() . '/documents' . '/' . $document->url;
    if (file_exists(($ruta))) {
        unlink($ruta);
    }
}
    

    $eliminar=DB::table('proyecto_contratacion')->where('id', '=', $request->eliminarcontrato)->delete();
    $eliminar=DB::table('proyecto_ejecucion')->where('id_contrato', '=', $request->eliminarcontrato)->delete();
    $eliminar=DB::table('contract_documents')->where('id_contrato', '=', $request->eliminarcontrato)->delete();
    
    
    
    return back()->with('status', '¡El contrato ha sido eliminado correctamente!');

}

 /*Función que actualiza los registros de la fase de ejecución*/
    public function updateejecucion(Request $request)
    {

        if (!empty($request->documents)) {

            $request->validate([
                'documenttype'=>'required',
            ]);

            for ($i = 0; $i < sizeof($request->documents); $i++) {
                $nombre_img = $_FILES['documents']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);
                move_uploaded_file($_FILES['documents']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;


       

                $documents = new Documents();
                $documents->documentType = $request->documenttype;
                $documents->description = 'ejecucion';
                $documents->url = $url;
                $documents->save();

                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $request->id_project;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
        }

        $proyecto_ejecucion = DB::table('proyecto_ejecucion')
            ->where('id_contrato', '=', $request->id_contrato)
            ->update([
              
                'descripcion' => $request->descripcion,
                'variacionespreciocontrato' => $request->variacionespreciocontrato,
                'razonescambiopreciocontrato' => $request->razonescambiopreciocontrato,
                'variacionesduracioncontrato' => $request->variacionesduracioncontrato,
                'razonescambioduracioncontrato' => $request->razonescambioduracioncontrato,
                'variacionesalcancecontrato' => $request->variacionesalcancecontrato,
                'razonescambiosalcancecontrato' => $request->razonescambiosalcancecontrato,
                'aplicacionescalatoria' => $request->aplicacionescalatoria,
                'estadoactualproyecto' => $request->estadoactualproyecto,
                'observaciones'=>$request->observaciones,


            ]);

            if (!empty($request->documents)) {
                $id_contrato = $request->id_ejecucion;
              
                DB::table('contract_documents')
                ->insert(
                    [
                        'id_contrato'=>$id_contrato,
                        'id_document'=>$documents->id
                    ]);
                    return back()->with('status', '¡La fase de ejecución ha sido actualizada correctamente!');
                }

        //ProjectController::havedocuments($request, 'ejecucion');
      


        if ($proyecto_ejecucion) {


            return back()->with('status', '¡La fase de ejecución ha sido actualizada correctamente!');
        } else {
            return back()->with('status', '¡La fase de ejecución no ha podido actualizarse!');
        }
    }
     /*Función que actualiza los registros de la fase de finalización*/
    public function updatefinalizacion(Request $request)
    {

        $proyecto_finalizacion = DB::table('proyecto_finalizacion')
            ->where('id_project', '=', $request->id_project)
            ->update([
                'id_project' => $request->id_project,
                'descripcion' => $request->descripcion,
                'costofinalizacion' => $request->costofinalizacion,
                'fechafinalizacion' => $request->fechafinalizacion,
                'alcancefinalizacion' => $request->alcancefinalizacion,
                'razonescambioproyecto' => $request->razonescambioproyecto,
                'referenciainforme' => $request->referenciainforme,
                'observaciones'=>$request->observaciones,


            ]);
        ProjectController::havedocuments($request, 'finalizacion');
        if ($proyecto_finalizacion) {
            return back()->with('status', '¡La fase de finalización ha sido actualizada correctamente!');
        } else {
            return back()->with('status', '¡La información no ha podido ser registrada!');
        }
    }
     /*Función que guarda un nuevo registro de la fase de finalizacion*/
    public function savefinalizacion(Request $request)
    {
        /*
        $request->validate([
            
            'descripcion'=>'max:50',
            'costofinalizacion'=>'max:50',
            'fechafinalizacion'=>'max:50',
            'alcancefinalizacion'=>'max:50',
            'razonescambioproyecto'=>'max:50',
            'referenciainforme'=>'max:50',
            
        ]);
        */
        $request->validate([

            'costofinalizacion'=>'max:20',
        
        ]);
        ProjectController::havedocuments($request, 'finalizacion');
        $proyecto_finalizacion = DB::table('proyecto_finalizacion')
            ->insert([
                'id_project' => $request->id_project,
                'descripcion' => $request->descripcion,
                'costofinalizacion' => $request->costofinalizacion,
                'fechafinalizacion' => $request->fechafinalizacion,
                'alcancefinalizacion' => $request->alcancefinalizacion,
                'razonescambioproyecto' => $request->razonescambioproyecto,
                'referenciainforme' => $request->referenciainforme,
                'observaciones'=>$request->observaciones,


            ]);
       

        if ($proyecto_finalizacion) {
            DB::table('project')
                ->where('id', $request->id_project)
                ->update(['status' => 5]);

            return back()->with('status', '¡El formulario ha sido completado y guardado correctamente!');
        } else {
        }
    }
    /*Función que guarda un nuevo registro de la fase de ejecucion*/
    public function saveejecucion(Request $request)
    {

        /*

       $request->validate([
        'variacionespreciocontrato'=>'max:50',
        'razonescambiopreciocontrato'=>'max:50',
        'variacionesduracioncontrato'=>'max:50',
        'razonescambioduracioncontrato'=>'max:50',
        'variacionesalcancecontrato'=>'max:50',

        'razonescambiosalcancecontrato'=>'max:50',
        'aplicacionescalatoria'=>'max:50',
        'estadoactualproyecto'=>'max:50',

        ]);  
     */

   
       if (empty($request->id_contrato)) {
           // preguntamos si hay un valor en el campo id_contrato
           return back()->with('status', '¡No hay contratos!');
       } else {
                //Validamos que tenga documentos.
                //ProjectController::havedocuments($request, 'ejecucion');

                if (!empty($request->documents)) {

                    $request->validate([
                        'documenttype'=>'required',
                    ]);
        
                    for ($i = 0; $i < sizeof($request->documents); $i++) {
                        $nombre_img = $_FILES['documents']['name'][$i];
                        $nombre_img =str_replace(' ', '', $nombre_img);
                        move_uploaded_file($_FILES['documents']['tmp_name'][$i], 'documents/' . $nombre_img);
                        $url = $nombre_img;
        
        
               
        
                        $documents = new Documents();
                        $documents->documentType = $request->documenttype;
                        $documents->description = 'ejecucion';
                        $documents->url = $url;
                        $documents->save();
        
                        $projectdocuments = new ProjectDocuments();
                        $projectdocuments->id_project = $request->id_project;
                        $projectdocuments->id_document = $documents->id;
                        $projectdocuments->save();
                    }
                }

               // Si hay id_contrato entonces lo recorremos
          

                   // Capturamos todos los datos que en variables o podemos pasarlos directamente
               
                   $proyecto_ejecucion = DB::table('proyecto_ejecucion')
                   ->insert([
                       'id_project' => $request->id_project,
                       'id_contrato'=>$request->id_contrato,
                       'descripcion' => $request->descripcion,
                       'variacionespreciocontrato' => $request->variacionespreciocontrato,
                       'razonescambiopreciocontrato' => $request->razonescambiopreciocontrato,
                       'variacionesduracioncontrato' => $request->variacionesduracioncontrato,
                       'razonescambioduracioncontrato' => $request->razonescambioduracioncontrato,
                       'variacionesalcancecontrato' => $request->variacionesalcancecontrato,
                       'razonescambiosalcancecontrato' => $request->razonescambiosalcancecontrato,
                       'aplicacionescalatoria' => $request->aplicacionescalatoria,
                       'estadoactualproyecto' => $request->estadoactualproyecto,
                       'observaciones'=>$request->observaciones,
       
       
                   ]);
           
                   if (!empty($request->documents)) {
                    $id_contrato = DB::getPdo()->lastInsertId();
                    DB::table('contract_documents')
                    ->insert(
                        [
                            'id_contrato'=>$id_contrato,
                            'id_document'=>$documents->id
                        ]);
                    }
            
        

  
          

        $project=Project::find($request->id_project);
        if($project->status<=3){
            DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 4]);
        }

    return redirect()->route('project.finalizacion', [
        'project' => $request->id_project,
    ]);;    
          
       }
     
    
        
    }
/*Función que guarda un nuevo registro de la fase de contratacion*/
    public function savecontratacion(Request $request)
    {

      
       
        /*
        $request->validate([
        
        'datosdecontacto'=>'max:50',
        'fechapublicacion'=>'max:50',
            
        'entidadadjudicacion'=>'max:50',
        'nombreresponsable'=>'max:50',
        'modalidadadjudicacion'=>'max:50',

        'tipocontrato'=>'max:50',
        'modalidadcontrato'=>'max:50',
        'estadoactual'=>'required|max:50',

        'empresasparticipantes'=>'max:250',
        'entidad_admin_contrato'=>'max:50',

        'titulocontrato'=>'max:50',
        'empresacontratada'=>'max:50',
        'viapropuesta'=>'max:50',

        'fechapresentacionpropuesta'=>'required|max:50',
        'montocontrato'=>'max:50',
        'alcancecontrato'=>'max:50',
        'fechainiciocontrato'=>'max:50',
        'duracionproyecto_contrato'=>'max:50',
        
        ]);
        */
        $request->validate([

            'telefonocontacto'=>'max:10',
            'montocontrato'=>'max:22',
        ]);

        if (!empty($request->fechapublicacion)) {
            $request->validate([

                'fechapublicacion' => 'date|before:fechapresentacionpropuesta',
                'fechapresentacionpropuesta' => 'date|before:fechainiciocontrato|after:fechapublicacion',
                'fechainiciocontrato' => 'date|after:fechapresentacionpropuesta|after:fechapublicacion',

            ]);
        }
        //No se usa la función ya que se necesita registrar en otra tabla.
        //ProjectController::havedocuments($request, 'contratacion');


        if (!empty($request->documents)) {

            $request->validate([
                'documenttype'=>'required',
            ]);

            for ($i = 0; $i < sizeof($request->documents); $i++) {
                $nombre_img = $_FILES['documents']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);
                move_uploaded_file($_FILES['documents']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;


       

                $documents = new Documents();
                $documents->documentType = $request->documenttype;
                $documents->description = 'contratacion';
                $documents->url = $url;
                $documents->save();

                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $request->id_project;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
        }
    

        $procedimiento_contratacion = DB::table('proyecto_contratacion')
            ->insert([
                'id_project' => $request->id_project,
                'descripcion' => $request->descripcion,
                'fechapublicacion' => $request->fechapublicacion,
                'entidadadjudicacion' => $request->entidadadjudicacion,
                //'datosdecontacto' => $request->datosdecontacto,
                'nombrecontacto'=>$request->nombrecontacto,
                'emailcontacto'=>$request->emailcontacto,
                'telefonocontacto'=>$request->telefonocontacto,
                'domiciliocontacto'=>$request->domiciliocontacto,
                'nombreresponsable' => $request->nombreresponsable,
                'modalidadadjudicacion' => $request->modalidadadjudicacion,
                'tipocontrato' => $request->tipocontrato,
                'modalidadcontrato' => $request->modalidadcontrato,
                'estadoactual' => $request->estadoactual,
                'empresasparticipantes' => $request->empresasparticipantes,
                'entidad_admin_contrato' => $request->entidad_admin_contrato,
                'titulocontrato' => $request->titulocontrato,
                'empresacontratada' => $request->empresacontratada,
                'viapropuesta' => $request->viapropuesta,
                'fechapresentacionpropuesta' => $request->fechapresentacionpropuesta,
                'montocontrato' => $request->montocontrato,
                'alcancecontrato' => $request->alcancecontrato,
                'fechainiciocontrato' => $request->fechainiciocontrato,
                'duracionproyecto_contrato' => $request->duracionproyecto_contrato,
                'observaciones'=>$request->observaciones,


            ]);

            if (!empty($request->documents)) {
        $id_contrato = DB::getPdo()->lastInsertId();
        DB::table('contract_documents')
        ->insert(
            [
                'id_contrato'=>$id_contrato,
                'id_document'=>$documents->id
            ]);
        }


        if ($procedimiento_contratacion) {

            


            $project=Project::find($request->id_project);
            if($project->status<=2){
                DB::table('project')
                ->where('id', $request->id_project)
                ->update(['status' => 3]);
            }
            
          

          

            return redirect()->route('project.ejecucion', [
                'project' => $request->id_project,
            ]);;
        } else {
        }
    }
/*Función que guarda un nuevo registro de la fase de preparacion*/
    public function savepreparacion(Request $request)
    {

        $fecha_in = date('Y-m-d');

        $request->validate([
            'tipoAmbiental' => 'required',
            'fecharealizacionAmbiental' => 'required|max:50',
            'responsableAmbiental' => 'required|max:255',
            'numeros_ambiental' => 'required',

            'tipoFactibilidad' => 'required',
            'fecharealizacionFactibilidad' => 'required|max:50',
            'responsableFactibilidad' => 'required|max:255',
            'numeros_factibilidad' => 'required',

            'tipoImpacto' => 'required',
            'fecharealizacionImpacto' => 'required|max:50',
            'responsableImpacto' => 'required|max:255',
            'numeros_impacto' => 'required',

            'origenrecurso' => 'required',
            'fuenterecurso' => 'required|max:255',
            'fecharecurso' => 'required|max:50'

        ]);

  //Guardar el documento y la relación con su proyecto.


    ProjectController::havedocuments($request, 'preparacion');


        DB::table('estudiosambiental')->insert([
            'id_project' => $request->id_project,
            'descripcionAmbiental' => $request->descripcionAmbiental,
            'tipoAmbiental' => $request->tipoAmbiental,
            'fecharealizacionAmbiental' => $request->fecharealizacionAmbiental,
            'responsableAmbiental' => $request->responsableAmbiental,
            'numeros_ambiental' => $request->numeros_ambiental,
            'observaciones'=>$request->observaciones,
        ]);

        DB::table('estudiosfactibilidad')->insert([
            'id_project' => $request->id_project,
            'descripcionFactibilidad' => $request->descripcionFactibilidad,
            'tipoFactibilidad' => $request->tipoFactibilidad,
            'fecharealizacionFactibilidad' => $request->fecharealizacionFactibilidad,
            'responsableFactibilidad' => $request->responsableFactibilidad,
            'numeros_factibilidad' => $request->numeros_factibilidad,
        ]);
        DB::table('estudiosimpacto')->insert([
            'id_project' => $request->id_project,
            'descripcionImpacto' => $request->descripcionImpacto,
            'tipoImpacto' => $request->tipoImpacto,
            'fecharealizacionImpacto' => $request->fecharealizacionImpacto,
            'responsableImpacto' => $request->responsableImpacto,
            'numeros_impacto' => $request->numeros_impacto,
        ]);

        DB::table('project')
            ->where('id', $request->id_project)
            ->update(['status' => 2]);





        $presupuesto = new BudgetBreakdown();
        $presupuesto->description = $request->origenrecurso;
        $presupuesto->sourceParty_name = $request->fuenterecurso;


        $period = new Period();
        $period->startDate = $request->fecharecurso;
        $period->save();

        $presupuesto->id_period = $period->id;
        $presupuesto->save();

        DB::table('project_budgetbreakdown')
            ->insert([

                'id_project' => $request->id_project,
                'id_budget' => $presupuesto->id,
            ]);


      


        return redirect()->route('project.contratacion', [
            'project' => $request->id_project,
        ]);
    }

public function getdocsfromcontract(){
    $id_contrato=$_POST['id_contrato'];
    $contract_documents=DB::table('contract_documents')
    ->join('documents','contract_documents.id_document','=','documents.id')
    ->join('documenttype','documents.documenttype','=','documenttype.id')
    ->select('documents.id','documents.url','documenttype.titulo',
    'contract_documents.id_document')
    ->where('id_contrato','=',$id_contrato)
    ->get();
    
    echo json_encode($contract_documents);   
}
    
/*Función que guarda un nuevo registro de la fase de identificacion*/
    public function saveidentificacion(Request $request)
    {




        $fecha_in = date('Y-m-d');

        $request->validate([

            'tituloProyecto' => 'required',
            'ocid' => 'required|max:50',
            'descripcionProyecto' => 'required',
            'autoridadP' => 'required|max:50',
            'propositoProyecto' => 'required',
            'sectorProyecto' => 'required|max:50',
            'subsector' => 'required|max:50',
            'tipoProyecto' => 'required|max:50',
            'people' => 'required|max:11',
            'porcentaje_obra' => 'required|max:11',

            'streetAddress' => 'required',
            'suburb'=>'required',
            'locality' => 'required',
            'region' => 'required',
            'state'=>'required',
            'postalCode' => 'required|max:50',
            'countryName' => 'required',
            'description' => 'required',
            'people' => 'required|max:50',

            'nombreresponsable' => 'required|max:50',
            'cargoresponsable' => 'required|max:50',
            'telefonoresponsable' => 'required|max:20',
            'correoresponsable' => 'required|max:100',
            'domicilioresponsable' => 'required|max:100',
            'horarioresponsable' => 'required|max:50',
            
            



        ]);


        $project = Project::find($request->id_project);



        $project->ocid = $request->ocid;
        $project->updated = $fecha_in;
        $project->title = $request->tituloProyecto;
        $project->description = $request->descripcionProyecto;
        $project->status = 1;

        $project->sector = $request->sectorProyecto;
        $project->subsector = $request->subsector;
        $project->purpose = $request->propositoProyecto;
        $project->type = $request->tipoProyecto;
        $project->people = $request->people;
        $project->porcentaje_obra = $request->porcentaje_obra;


        $project->publicAuthority_name = '';
        $project->publicAuthority_id = $request->autoridadP;
        $project->observaciones=$request->observaciones;


        $project->save();

        //responsable del proyecto.

        DB::table('responsableproyecto')->insert([


            'nombreresponsable' => $request->nombreresponsable,
            'cargoresponsable' => $request->cargoresponsable,
            'telefonoresponsable' => $request->telefonoresponsable,
            'correoresponsable' => $request->correoresponsable,
            'domicilioresponsable' => $request->domicilioresponsable,
            'horarioresponsable' => $request->horarioresponsable,
            'id_project' => $request->id_project,
        ]);


        DB::table('project_organizations')->insert(
            [

                'id_project' => $project->id,
                'id_organization' => $request->autoridadP,
            ]
        );

        $address = new Address();
        $address->streetAddress = $request->streetAddress;
        $address->suburb=$request->suburb;
        $address->state=$request->state;
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
        $locations->principal = $request->principal;
        $locations->names = $request->names;
        $locations->lat = $request->lat;
        $locations->lng = $request->lng;
        $locations->save();




        $project_locations = new ProjectLocations();
        $project_locations->id_project = $project->id;
        $project_locations->id_location = $locations->id;
        $project_locations->save();




        //Guardar el documento y la relación con su proyecto.
        if (!empty($request->docfase1)) {

            $request->validate(['documenttype'=>'required']);

            for ($i = 0; $i < sizeof($request->docfase1); $i++) {
                $nombre_img = $_FILES['docfase1']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);

                move_uploaded_file($_FILES['docfase1']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;




                $documents = new Documents();
                $documents->documentType = $request->documenttype;
                $documents->description = "identificacion";
                $documents->url = $url;
                $documents->save();

                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $project->id;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
        }




        return redirect()->route('project.preparacion', ['project' => $project->id]);;
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

/**Función que elimina toda la información relacionada con un proyecto especifico(id) */
    public function destroy($id)
    {
        //

        if ($id != 0) {




            $project = Project::find($id);

            //to unlink projects imgs

            $projects_imgs = DB::table('projects_imgs')
                ->where('id_project', '=', $project->id)
                ->get();


            foreach ($projects_imgs as $project_img) {
                $ruta = 'projects_imgs/' . $project_img->imgroute;
                if (file_exists(($ruta))) {
                    unlink($ruta);
                }
            }





            if (!empty($project)) {


                //Para eliminar los documentos asociados al proyecto.
                $project_documents = DB::table('project_documents')
                    ->join('documents', 'project_documents.id_document', '=', 'documents.id')
                    ->where('project_documents.id_project', '=', $id)
                    ->get();


                foreach ($project_documents as $document) {

                    Documents::destroy($document->id);
                    $ruta = public_path() . '/documents' . '/' . $document->url;
                    if (file_exists(($ruta))) {
                        unlink($ruta);
                    }
                }




                //Para eliminar la ubicación del proyecto.
                $project_locations = ProjectLocations::where('id_project', '=', $id)
                    ->first();

                if ($project_locations != null) {
                    $locations = Locations::find($project_locations->id_location);

                    Address::destroy($locations->id_address);
                }





                $project_budget = DB::table('project')
                    ->join('project_budgetbreakdown', 'project.id', '=', 'project_budgetbreakdown.id_project')
                    ->select('project_budgetbreakdown.id_budget')
                    ->where('project.id', '=', $id)
                    ->first();

                if ($project_budget != null) {
                    BudgetBreakdown::destroy($project_budget->id_budget);
                }




                Project::destroy($id);


                return back()->with('status', '¡Proyecto eliminado con éxito!');
            } else {
                return back()->with('status', '¡Proyecto no encontrado!');
            }
        } else {
            return back()->with('status', '¡No se pudo procesar la petición!');
        }
    }
    /**Función que permite eliminar un documento especifico por su id dentro 
     * de todas las fases en las que se registren documentos.
     */
    public function deletedocument(Request $request)
    {


        $document = Documents::find($request->doc_id);

        $url = public_path() . '/documents' . '/' . $document->url;
        if (file_exists(($url))) {
            unlink($url);
        }

        $document->delete();
        return back()->with('status', '¡Documento eliminado!');
    }
    /**Función que valida el request para verificar que contenga documentos 
     * recorre el array de documentos y los guarda en el servidor como en la base de datos 
     * y se les agrega en la descripción la fase a la que hace referencia dicho documento.
     */
    public static function havedocuments(Request $request, $fase)
    {


        if (!empty($request->documents)) {

            $request->validate([
                'documenttype'=>'required',
            ]);

            for ($i = 0; $i < sizeof($request->documents); $i++) {
                $nombre_img = $_FILES['documents']['name'][$i];
                $nombre_img =str_replace(' ', '', $nombre_img);
                move_uploaded_file($_FILES['documents']['tmp_name'][$i], 'documents/' . $nombre_img);
                $url = $nombre_img;


       

                $documents = new Documents();
                $documents->documentType = $request->documenttype;
                $documents->description = $fase;
                $documents->url = $url;
                $documents->save();

                $projectdocuments = new ProjectDocuments();
                $projectdocuments->id_project = $request->id_project;
                $projectdocuments->id_document = $documents->id;
                $projectdocuments->save();
            }
        }
    }
    /*Para fines de testeo en el mapa*/
    public function testmap()
    {
        return view('admin.testmap');
    }
    public function testmap2()
    {
        return view('admin.testmap2');
    }
    public function tm()
    {


        return view('admin.testmap', [
            'datos' => $_POST,
        ]);
    }
    /**Función que permite cargar el csv de la fase de identifación que contiene el nombre, lat, lng
     * de los puntos que se dibujaran en el mapa en base al csv subido mediante AJAX.
     */
    public function uploadExcel()
    {
        // print_r($_FILES);


        $file = $_FILES['excel']['name'];
        $file = str_replace(' ', '', $file);
        $aux_file = time() . $file;



        //move_uploaded_file($file,asset('documents/'.$file));
        move_uploaded_file($_FILES['excel']['tmp_name'], 'documents/' . $aux_file);

        $file = asset('documents/' . $aux_file);


        $csv = file_get_contents($file);
        $array = array_map("str_getcsv", explode("\n", $csv));
        $json = json_encode($array);
        //$json= fopen(asset('documents/'.$aux_file), 'r');

        //$f=asset('documents/'.$aux_file);


        return $json;
    }
}
