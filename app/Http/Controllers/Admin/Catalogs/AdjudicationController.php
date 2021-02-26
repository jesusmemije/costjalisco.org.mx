<?php

namespace App\Http\Controllers\Admin\Catalogs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdjudicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $adjudications=DB::table('catmodalidad_adjudicacion')->get();
       
        return view('admin.catalogs.adjudication',
        [
            'adjudications'=>$adjudications,
           
        
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
        $r=DB::table('catmodalidad_adjudicacion')->insert([
            'titulo'=>$request->titulo,
        ]);

        if($r){
                
            return back()->with('status', 'Adjudicación registrada correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo registrar!');
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

        $r=DB::table('catmodalidad_adjudicacion')
        ->where('id',$id)
        ->update(['titulo'=>$request->newtitulo]);
        if($r){
        
            return back()->with('status', '¡Adjudicación actualizado correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo actualizar!');
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

        $r=DB::table('catmodalidad_adjudicacion')->delete($id);
        if($r){
            
            return back()->with('status', '¡Adjudicación eliminada correctamente!');
        }else{
            return back()->with('status', '¡La adjudicación no se pudo eliminar!');
        }
    }
}
