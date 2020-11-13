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
        ->select('organization.id','organization.name as orgname','contact_point.*')
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
            'create'=>true
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
        //

        $dataorg=DB::table('organization')
        ->join('contact_point','organization.id_contact_point','=','contact_point.id')
        ->join('address','organization.id_address','=','address.id')
        ->join('party_role','organization.id_partyRole','=','party_role.id')
        ->select('organization.name as orgname','contact_point.*','address.*','party_role.*')
        ->get();

       
      

        $users=User::all();
        $party_rol=OrganizationsRol::all();
        return view('admin.organizations.edit',[
            'organization'=>$dataorg[0],
            'users'=>$users,
            'roles'=>$party_rol,
            'create'=>false
        ]);
        
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
        
        $organization=Organization::find($id);

        if(!empty($organization)){
            Organization::destroy($id);
            Identifier::destroy($organization->id_identifier);
            Address::destroy($organization->id_address);
            ContactPoint::destroy($organization->id_contact_point);
          
            return back()->with('status', '¡Organización dada de baja correctamente!');
        }else{
           
        }

       



    }

    public function createRol(){
        return view('admin.organizations.createRol');
    }
    public function storeRol(Request $request){

        $rol=new OrganizationsRol();
        $rol->titulo=$request->title;
        $rol->descripcion=$request->description;
        $rol->save();
        return back()->with('status', '¡Rol registrado correctamente!');

    }

  
}