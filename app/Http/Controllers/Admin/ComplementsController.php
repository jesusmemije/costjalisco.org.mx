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

        
        $cont_fa= strlen($request->fecha_actualizacion);
        $cont_a =strlen($request->fecha_actualizacion);
        // dd($cont_fa,$cont_a);
        if ($cont_fa>10 || $cont_a>10 ) {
            return back()->with('status', 'Revise la fecha, debe ser dia/mes/año!');
        } else {
            $fecha_actualizacion=$request->fecha_actualizacion;
            $fa = str_split($fecha_actualizacion);
            $dias=$fa[0].$fa[1];
            $mess=$fa[3].$fa[4];
            $años=$fa[6].$fa[7].$fa[8].$fa[9];
            
            $fecha_a_listo = $años.'-'.$mess.'-'.$dias;

            $fecha_anio=$request->anio;
            $fan = str_split($fecha_anio);
            $dias=$fan[0].$fan[1];
            $mess=$fan[3].$fan[4];
            $años=$fan[6].$fan[7].$fan[8].$fan[9];
        
            $fecha_an_listo = $años.'-'.$mess.'-'.$dias;

            Complements::where('id','=',$id)->update([
                'fecha_actualizacion' => $fecha_a_listo,
                'anio'                => $fecha_an_listo,

            ]);
                return back()->with('status', 'Complementos actualizado con éxito!');
        }
        


        
    }
}
