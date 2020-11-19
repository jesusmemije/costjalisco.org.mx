<?php

namespace App\Http\Controllers\Admin\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos=DB::table('projecttype')->get();


        return view('admin.catalogs.projecttype',[
            'tipos'=>$tipos
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
        $r=  DB::table('projecttype')->insert([
            ['titulo' => $request->titulo],
           
        ], ['titulo'], ['titulo']);
        if($r){
            return back()->with('status', '¡Tipo de proyecto registrado!');
        }else{
            return back()->with('status', 'El tipo de proyecto no se pudo registrar');
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

        $r= DB::table('projecttype')
        ->where('id','=',$id)
        ->update(['titulo'=>$request->newtitulo]);

        if($r){
            
            return back()->with('status', '¡Tipo de proyecto actualizado correctamente!');
        }else{
            return back()->with('status', '¡El tipo de proyecto no se pudo actualizat!');
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

        $r=DB::table('projecttype')->delete($id);
        if($r){
            
            return back()->with('status', '¡Tipo de proyecto eliminado correctamente!');
        }else{
            return back()->with('status', '¡El tipo de proyecto no se pudo eliminar!');
        }
    }
}
