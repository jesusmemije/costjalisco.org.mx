<?php

namespace App\Http\Controllers\Admin\Catalogs;

use App\Http\Controllers\Controller;
use App\Models\DocumentType;
use Illuminate\Http\Request;

class DocumentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $types=DocumentType::all();
       
        return view('admin.catalogs.documenttype',[
        'types'=>$types,
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
    public static function myresponse($r,$c,$a,$d){
       
        if($r){
         
            return back()->with('status', $c.' '.$a);
        }else{
            return back()->with('status', '¡El'.$c.' no se pudo '.$d.' !');
        }
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
        
       $r= DocumentType::insert([
            'titulo'=>$request->titulo,
        ]);
        
       return  self::myresponse($r,'Tipo de documento', 'registrado correctamente','registrar');
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
       $r=DocumentType::where('id', $id)
       ->update(['titulo' => $request->newtitulo]);
       return  self::myresponse($r,'Tipo de documento', 'editado correctamente','editar');
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
      $r= DocumentType::destroy($id);

       return  self::myresponse($r,'Tipo de documento', 'eliminado correctamente','eliminar');
    }
}
