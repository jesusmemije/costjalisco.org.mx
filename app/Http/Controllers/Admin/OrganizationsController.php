<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\ContactPoint;
use App\Models\Identifier;
use App\Models\Organization;
use App\Models\OrganizationsRol;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $organizations=DB::table('organization')
        ->join('contact_point','organization.id_contact_point','=','contact_point.id')
        ->select('organization.id as id_organization','organization.name as orgname','contact_point.*')
        ->get();


        
      
        return view('admin.organizations.index',['organizations'=>$organizations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $users=User::all();
        $party_rol=OrganizationsRol::all();
        
        return view('admin.organizations.create',[
            'organization'=>new Organization(),
            'users'=>$users,
            'roles'=>$party_rol,
            'create'=>true,
            'ruta'=>'',
        ]);
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
        
     

        $identifier=new Identifier();

        $identifier->scheme="ocid/x".$request->name;
        $identifier->_id="X";
        $identifier->legalName=$request->name;

        $identifier->save();

        $address=new Address();
        
        $address->streetAddress=$request->streetAddress;
        $address->locality=$request->locality;
        $address->region=$request->region;
        $address->postalCode=$request->postalCode;
        $address->countryName=$request->countryName;
        $address->save();

        $contact_point=new ContactPoint();
        $contact_point->name=$request->nameContact;
        $contact_point->email=$request->emailContact;
        $contact_point->telephone=$request->telephone;
        $contact_point->faxNumber=$request->faxNumber;
        $contact_point->url=$request->url;
        $contact_point->save();
       

        $organization=new Organization();
        $organization->name=$request->name;
        $organization->_id='X';
        $organization->id_identifier=$identifier->id;
        $organization->id_address=$address->id;
        $organization->id_contact_point=$contact_point->id;
        $organization->id_partyRole=$request->partyRole;
        $organization->save();



        //to save the image logo org
        if(!empty($request->imgOrg)){        
            $nombre_img = $_FILES['imgOrg']['name'];
    
            move_uploaded_file($_FILES['imgOrg']['tmp_name'],'orglogos/'.$nombre_img);
            $url=$nombre_img;

            DB::table('orglogos')->insert([
                'id_organization'=>$organization->id,
                'imgroute'=>$url,
            ]);
    
           
               
            
            }

       return redirect()->route('organizations.create')->with(['status' => '¡Listo! La organización se ha guardado correctamente']);

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
    public function edit(Organization $organization)
    {  


        $dataorg=DB::table('organization')
        ->join('contact_point','organization.id_contact_point','=','contact_point.id')
        ->join('address','organization.id_address','=','address.id')
        ->join('party_role','organization.id_partyRole','=','party_role.id')
        ->where('organization.id','=',$organization->id)
        ->select('organization.name as orgname','organization.id as id_organization','contact_point.*','address.*','party_role.id as partyid')
        ->first();

       

       
        $orglogo=DB::table('orglogos')->where('id_organization','=',$organization->id)->first();
        if($orglogo!=null){
            $ruta=$orglogo->imgroute;
            $ruta='orglogos/'.$ruta;
        }else{
            $ruta="";
        }
        
     

        $users=User::all();
        $party_rol=OrganizationsRol::all();
        return view('admin.organizations.edit',[
            'organization'=>$dataorg,
            'users'=>$users,
            'roles'=>$party_rol,
            'create'=>false,
            'ruta'=>$ruta,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //


       
        $id_organization=$request->id_organization;
       
        $id_identifier=Organization::find($id_organization)->id_identifier;

        $id_address=Organization::find($id_organization)->id_address;
        $id_contact_point=Organization::find($id_organization)->id_contact_point;;

        $identifier=Identifier::find($id_identifier);
        

        $identifier->scheme="ocid/x".$request->name;
        $identifier->_id="X";
        $identifier->legalName=$request->name;

        $identifier->save();

        $address=Address::find($id_address);
        
        $address->streetAddress=$request->streetAddress;
        $address->locality=$request->locality;
        $address->region=$request->region;
        $address->postalCode=$request->postalCode;
        $address->countryName=$request->countryName;
        $address->save();

        $contact_point=ContactPoint::find($id_contact_point);
        $contact_point->name=$request->nameContact;
        $contact_point->email=$request->emailContact;
        $contact_point->telephone=$request->telephone;
        $contact_point->faxNumber=$request->faxNumber;
        $contact_point->url=$request->url;
        $contact_point->save();
       

        $organization=Organization::find($id_organization);
        $organization->name=$request->name;
        $organization->_id='X';
        $organization->id_identifier=$identifier->id;
        $organization->id_address=$address->id;
        $organization->id_contact_point=$contact_point->id;
        $organization->id_partyRole=$request->partyRole;
        $organization->save();

        

        if(!empty($request->imgOrg)){        
            $nombre_img = $_FILES['imgOrg']['name'];
    
            move_uploaded_file($_FILES['imgOrg']['tmp_name'],'orglogos/'.$nombre_img);
            $url=$nombre_img;

            DB::table('orglogos')->insert([
                'id_organization'=>$organization->id,
                'imgroute'=>$url,
            ]);
    
           
               
            
            }

            return back()->with('status', '¡Listo! La organización se ha actualizado  correctamente');
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
        $organization=Organization::find($id);

        if(!empty($organization)){
            Organization::destroy($id);
            Identifier::destroy($organization->id_identifier);
            Address::destroy($organization->id_address);
            ContactPoint::destroy($organization->id_contact_point);
          
            return back()->with('status', '¡Organización dada de baja correctamente!');
        }else{
            
            return back()->with('status', '¡La organización no se pudo eliminar!');
        }

       



    }

    public function createRol(){
        $roles=DB::table('party_role')->get();


        return view('admin.organizations.createRol',['roles'=>$roles]);
    }
    public function storeRol(Request $request){

        $rol=new OrganizationsRol();
        $rol->titulo=$request->title;
        $rol->descripcion=$request->description;
        $rol->save();
        return back()->with('status', '¡Rol registrado correctamente!');

    }
    public function updateRol(Request $request){
       
        $r=DB::table('party_role')
        ->where('id','=',$request->edit_id)
        ->update(['titulo'=>$request->newtitulo,'descripcion'=>$request->description]);

        if($r){
            return back()->with('status', '¡Rol actualizado correctamente!');
        
        }else{
            return back()->with('status', '¡El rol no se pudo actualizar!');
        
        }

    }
    public function destroyRol(Request $request){
        OrganizationsRol::destroy($request->delete_id);
        return back()->with('status', '¡Rol eliminado correctamente!');
    }

  
}
