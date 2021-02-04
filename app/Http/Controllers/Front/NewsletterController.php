<?php

namespace App\Http\Controllers\Front;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Subscriber;

class NewsletterController extends Controller
{
    public function eventos(){

        // Mostramos todos los eventos
        $eventos=DB::table('events')
        ->select('events.*')
        ->where('status','=','Publicado')
        ->orderBy('date_start','DESC')
        ->distinct()
        ->get();

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

        // Enviamos la respuesta obtenida del mes consultado
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
                    $fecha_format = date('d', strtotime($f_per));

                    $diasArray[$dia->id] =$fecha_format;
                }
            }
            return response()->json($diasArray);
        }
    }
    public function mostrar_contenido(Request $request){
        // Buscamos el contenido del evento seleccionado y lo enviamos 
        $contenido=DB::table('events')
            ->select('events.*')
            ->where('id','=',$request->id_event)
            ->get();
        echo json_encode($contenido);
    }

    public function savemailsubscriberf(Request $request){
        // Consultamos si el email existe en la base de datos
        $existe=Subscriber::where('email',$request->email)->get();
        if(sizeof($existe)==0){
            // Si no existe entonces guardamos el email
            $s=new Subscriber();
            $s->email=$request->email;
            $s->save();
            return back()->with('status', 'Subscrito correctamente');
        }else{
            // Returnamos un mensaje de que el email ya existe en la base de datos
            return back()->with('status', 'El correo ya se encuentra registrado');
        }
      
    }
}
