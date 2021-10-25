<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;

use App\Models\Project;

use App\Models\User;

use Illuminate\Support\Facades\Validator;


use App\Exports\ProjectDataExport;
use App\Models\ProjectStatus;
use App\Models\ProjectSector;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestIdentificacion;

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


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



    Route::post('/autenticacion/sesion',function(Request $request){

      
        try {
            //code...
        
        $username=$request->username;
        $password=$request->password;


        $comprobar=
        DB::table('users')
        ->select('password')
        ->where('username','=',$username )
        ->first();
       
        $hashed=Hash::check($password,$comprobar->password);

        if($hashed){
            

            //$token=array('username'=>$username,'password'=>$comprobar->password);

           // $api_token=array('hash'=> hash('sha256', json_encode($token)));

            $user=User::where('username','=',$username)->first();

            $token = $user->createToken("testingtoken");

            return ['token' => $token->plainTextToken];


        }else{
            echo "nogood";
        }

      

     

    } catch (\Throwable $th) {

    
       
        $json['response'] = array(
            'status' => 'error',
            'message'  => 'datos inválidos'
        );
        
        echo json_encode($json,JSON_UNESCAPED_UNICODE);
    }
});







Route::group(['middleware'=>['auth:sanctum']], function () {
    

    Route::post('/project/create',function(Request $request){

        $array_errors=array();

       $validator1 = Validator::make($request->datos_generales, [
        'nombreresponsable' => 'required',
        'email' => 'required|email',
        'organismo' => 'required',
        'puesto' => 'required',
        'involucrado' => 'required',
        ]);

     
        $validator2 = Validator::make($request->identificacion, [
         
            'tituloProyecto' => 'required',
            'ocid' => 'required|max:50',
            'descripcionProyecto' => 'required',
            'autoridadP' => 'required|max:50',
            'propositoProyecto' => 'required',
            'sectorProyecto' => 'required|max:50',
            'subsector' => 'required|max:50',
            'tipoProyecto' => 'required|max:50',
            
            'porcentaje_obra' => 'required|max:11|numeric',

            'streetAddress' => 'required',
            'suburb' => 'required',
            'locality' => 'required',
            'region' => 'required',
            'state' => 'required',
            'postalCode' => 'required|max:6',
            'countryName' => 'required',
            'description' => 'required',
            'people' => 'required|max:50',

            'nombreresponsable' => 'required|max:50',
            'cargoresponsable' => 'required|max:50',
            'telefonoresponsable' => 'required|max:20',
            'correoresponsable' => 'required|max:100',
            //'domicilioresponsable' => 'required|max:100',
            'horarioresponsable' => 'required|max:50',

            
            'streetAddressc' => 'required',
            'streetNumc'=>'required',
            'suburbc' => 'required',
            'localityc' => 'required',
            'postalCodec' => 'required|max:6',
           

            ]);

    

         $errors=$validator1->errors();   

        foreach ($errors->messages() as $key=> $value) {
        
           array_push($array_errors,[$key=>$value]);
            
          
   
        }
       
      

         $errors=$validator2->errors();   

        foreach ($errors->messages() as $key=> $value) {
        
            //$array_errors[]=array($key=>$value);

            array_push($array_errors,[$key=>$value]);
            
       
        }

      

 
          $validator3=false;
          if(isset($request->estudiosAmbiental)){
          
            $validator3=Validator::make($request->estudiosAmbiental,[
                
                'tipoAmbiental' => 'required',
                'fecharealizacionAmbiental' => 'required|max:50',
                'responsableAmbiental' => 'required|max:255',
                'numeros_ambiental' => 'required',    
              ]); 

              
         $errors=$validator3->errors();   

         foreach ($errors->messages() as $key=> $value) {
         
             //$array_errors[]=array($key=>$value);
 
             array_push($array_errors,[$key=>$value]);
            
        
         }
         if($validator3->fails()){
             $validator3=true;
         }else{
             $validator3=false;
         }
     
        }

        $validator4=false;
        
        if(isset($request->estudiosFactibilidad)){
            
            $validator4=Validator::make($request->estudiosFactibilidad,[

                'tipoAmbiental' => 'required',
                'fecharealizacionAmbiental' => 'required|max:50',
                'responsableAmbiental' => 'required|max:255',
                'numeros_ambiental' => 'required',    
              ]); 
              $errors=$validator4->errors();   

              foreach ($errors->messages() as $key=> $value) {
              
                  //$array_errors[]=array($key=>$value);
      
                 array_push($array_errors,[$key=>$value]);
             
              }

              if($validator4->fails()){
                $validator4=true;
            }else{
                $validator4=false;
            }
              
        }
        

     

      
      
        if ($validator1->fails() || $validator2->fails() || $validator3 || $validator4 ) {
            //echo json_encode($array_errors,JSON_UNESCAPED_UNICODE);
          
            return response()->json($array_errors, 500);
        }else{

      

        


        $project=new Project();

        //Datos Generales
        $project->status = 7;
        /*Esta validación es para el caso de 'Agente multisectorial' ya que 
        este tipo de usario se asocia a una organización, entonces la autoridad pública 
        será la que tenga este usuario.
        */
        if (Auth::user()->id_organization != "") {
            $project->publicAuthority_id = Auth::user()->id_organization;
        }

        $project->save();


        //Se guarda la información de datos generales.
        $r = DB::table('generaldata')
            ->insert([
                'id_project' => $project->id,
                'descripcion' => '',
                'responsable' => $request['datos_generales']['nombreresponsable'],
                'email' =>$request['datos_generales']['email'],
                'organismo' => $request['datos_generales']['organismo'],
                'puesto' => $request['datos_generales']['puesto'],
                'involucrado' => $request['datos_generales']['involucrado'],
                'video' => $request['datos_generales']['video'],
                'observaciones' => $request['datos_generales']['video'],

            ]);
        //Se guarda la información del usuario que está registrando el proyecto.
        DB::table('doproject')
            ->insert([
                'id_project' => $project->id,
                'id_user' => Auth::user()->id,
            ]);


       


        //identificacion


        $project = Project::find($project->id);



        $project->ocid = $request['identificacion']['ocid'];
        $project->updated =  date('Y-m-d');
        $project->title =  $request['identificacion']['tituloProyecto'];
        $project->description = $request['identificacion']['descripcionProyecto'];
        $project->status = 1;

        $project->sector = $request['identificacion']['sectorProyecto'];
        $project->subsector = $request['identificacion']['subsector'];
        $project->purpose = $request['identificacion']['propositoProyecto'];
        $project->type = $request['identificacion']['tipoProyecto'];
        $project->people = $request['identificacion']['people'];
        $project->porcentaje_obra = $request['identificacion']['porcentaje_obra'];


        $project->publicAuthority_name = '';
        $project->publicAuthority_id = $request['identificacion']['autoridadP'];
        $project->observaciones = $request['identificacion']['observaciones'];


        $project->save();

        //responsable del proyecto.

        DB::table('responsableproyecto')->insert([


            'nombreresponsable' => $request['identificacion']['nombreresponsable'],
            'cargoresponsable' => $request['identificacion']['cargoresponsable'],
            'telefonoresponsable' => $request['identificacion']['telefonoresponsable'],
            'correoresponsable' => $request['identificacion']['correoresponsable'],
            'domicilioresponsable' => '',
            'horarioresponsable' => $request['identificacion']['horarioresponsable'],
            'id_project' => $project->id,

            'streetAddressc' => $request['identificacion']['streetAddressc'],
            'streetNumc'=>$request['identificacion']['streetNumc'],
            'suburbc' => $request['identificacion']['suburbc'],
            'localityc' => $request['identificacion']['localityc'],
            'postalCodec' => $request['identificacion']['postalCodec'],
           
        ]);


        DB::table('project_organizations')->insert(
            [

                'id_project' =>  $project->id,
                'id_organization' => $request['identificacion']['autoridadP'],
            ]
        );

        $address = new Address();
        $address->streetAddress = $request['identificacion']['streetAddress'];

        $address->suburb = $request['identificacion']['suburb'];
        $address->state = $request['identificacion']['state'];
        $address->locality = $request['identificacion']['locality'];
        $address->region = $request['identificacion']['region'];
        $address->postalCode = $request['identificacion']['postalCode'];
        $address->countryName = $request['identificacion']['countryName'];
        $address->save();


        $locations = new Locations();
        $locations->description = $request['identificacion']['description'];
        $locations->id_geometry = 1;
        $locations->id_gazetter = 1;
        $locations->id_address = $address->id;
        $locations->principal = $request['identificacion']['principal'];
        $locations->names = $request['identificacion']['names'];
        $locations->lat = $request['identificacion']['lat'];
        $locations->lng = $request['identificacion']['lng'];
        $locations->save();




        $project_locations = new ProjectLocations();
        $project_locations->id_project = $project->id;
        $project_locations->id_location = $locations->id;
        $project_locations->save();


        //Preparación


        DB::table('estudiosambiental')->insert([
            'id_project' => $project->id,
            'descripcionAmbiental' =>'',
            'tipoAmbiental' => $request['estudiosAmbiental']['tipoAmbiental'],
            'fecharealizacionAmbiental' => $request['estudiosAmbiental']['fecharealizacionAmbiental'],
            'responsableAmbiental' => $request['estudiosAmbiental']['responsableAmbiental'],
            'numeros_ambiental' => $request['estudiosAmbiental']['numeros_ambiental'],
            'observaciones' =>$request['estudiosAmbiental']['observaciones'],
        ]);
        $project = Project::find($project->id);
        if ($project->status <= 1) {
            DB::table('project')
                ->where('id', $project->id)
                ->update(['status' => 2]);
        }
       


       
    }
    
    
});

});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
