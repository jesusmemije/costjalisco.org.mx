<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;
use App\Models\Complements;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplementsController extends Controller
{
    public function edit(){

        $complements = DB::table('complements')
            ->select('complements.*')
            // ->orderBy('complements.nombreperiodico','asc')
            ->get();  
        return view("admin.complements.edit", ['complements' => $complements]);
    }

    public function update(Request $request,$id){
        Complements::where('id','=',$id)->update([
            'fecha_actualizacion' => $request->fecha_actualizacion,
            'anio'                => $request->anio,

        ]);
        return back()->with('status', 'Complementos actualizado con éxito!');
    }
}
