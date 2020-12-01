<?php

namespace App\Http\Controllers\Admin\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContractingStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contractsstatus=DB::table('contractingprocess_status')->get();

        return view('admin.catalogs.contractstatus',[
            'types'=>$contractsstatus,
        ]);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $r=DB::table('contractingprocess_status')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Estado de contrato registrado correctamente!');
        }else{
            return back()->with('status', '¡El estado de contrato no se pudo registrar!');
        }
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


        $r=DB::table('contractingprocess_status')
        ->where('id',$id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Estado de contrato actualizado correctamente!');
        }else{
            return back()->with('status', '¡El estado del contrato no se pudo actualizar!');
        }
       
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

        $r=DB::table('contractingprocess_status')->delete($id);
        if($r){
            
            return back()->with('status', '¡Estado de contrato eliminado correctamente!');
        }else{
            return back()->with('status', '¡El estado del contrato no se pudo eliminar!');
        }
    }
}
