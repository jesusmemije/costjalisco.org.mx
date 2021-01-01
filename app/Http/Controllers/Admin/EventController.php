<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{

    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();

        return view( 'admin.events.index', ['events' => $events]);
    }

    public function store(Request $request)
    {
        Event::create([
            'title'   => $request->title,
            'status'   => 'Pendiente'
        ]);

        return back()->with('status', '¡Evento creado con éxito!');
    }

    public function edit( Event $event )
    {
        return view("admin.events.edit", ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $fechas=$request->date_start;
        $fs = str_split($fechas);
        $dias=$fs[0].$fs[1];
        $mess=$fs[3].$fs[4];
        $años=$fs[6].$fs[7].$fs[8].$fs[9];
        $hs=$fs[11].$fs[12];
        $ms=$fs[14].$fs[15];
        $fecha_hora = $años.'-'.$mess.'-'.$dias.' '.$hs.':'.$ms.':00';

        // dd($fecha_hora);
        $event->update([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'date_start'  => $fecha_hora,
            'contact'     => $request->contact,
            'status'      => $request->status
        ]);

        return back()->with('status', '¡Evento actualizado con éxito!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('status', '¡Evento eliminado con éxito!');
    }
    public function mostrando_meses(){
        
    }
}
