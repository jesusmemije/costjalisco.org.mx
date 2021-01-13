<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mail\MessageReceived;


class CorreoController extends Controller
{
    public function store(){
        

        $sms=    request()->validate([

            'name'=>'required',
            'email'=> 'required|email',
            'subject'=> 'required',
            'content'=> 'required|min:3',
            'titulo'=> 'required|min:3',
            'fecha'=> 'required|min:3',
            'url'=> 'required|min:3',
            
        ], [
            'name.required'=> __('I need your name')
        
        ]);

        $suscriptores=DB::table('subscribers')
                ->select('subscribers.*')
                ->where('subscribers.status','=','suscrito')
                ->get();


        if (count($suscriptores)==0) {
            return back()->with('status', '¡No se pudo compartir por falta de suscriptores!');
        } else {
            foreach ($suscriptores as $suscriptor) {
                
                Mail::to($suscriptor->email)->queue(new MessageReceived($sms));
                // return new MessageReceived($sms); 
                // return 'Mensaje enviado';
                
            }

            return back()->with('status', '¡Boletín compartido con éxito!');
        }
    }
}
