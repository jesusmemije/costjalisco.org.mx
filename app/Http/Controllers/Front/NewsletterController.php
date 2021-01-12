<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;

class NewsletterController extends Controller
{
    public function eventos(){

        $eventos=DB::table('events')
        ->select('events.*')
        ->where('status','=','Publicado')
        ->orderBy('date_start','DESC')
        ->distinct()
        ->get();

            // dd($eventos);
        return view('front.eventos',['eventos'=>$eventos]);
    }

    public function newsletters()
    {
        $boletines=DB::table('newsletters')
        ->select('newsletters.*')
        ->where('status','=','Publicado')
        ->get();
        return view('front.newsletters',['boletines'=>$boletines]);
    }

    public function newsletter_single($id)
    {
        $boletin=Newsletter::find($id);
        return view('front.newsletter-single',['boletin'=>$boletin]);
    }

    public function subscribe(Request $request)
    {   
        
    }
    public function mostrar_dias(Request $request){    

        if ($request->ajax()) {
            $dias=DB::table('events')
            ->select('events.*')
            ->whereMonth('date_start', $request->mes)
            ->get();

            if (count($dias) == 0) {
                $diasArray[0] = 'No hay dias';
            } else {
                foreach ($dias as $dia) {
                    $f_per=$dia->date_start;
                    // $d=date_format($date, 'd-M-Y H:i:s');
                    $fecha_format = date('d', strtotime($f_per));

                    $diasArray[$dia->id] =$fecha_format;
                }
            }
            return response()->json($diasArray);
        }
    }
    public function mostrar_contenido(Request $request){

        $contenido=DB::table('events')
            ->select('events.*')
            ->where('id','=',$request->id_event)
            ->get();
        echo json_encode($contenido);
    }
}
