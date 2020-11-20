<?php

namespace App\Http\Controllers\Admin;

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
            'title'   => $request->title
        ]);

        return back()->with('status', '¡Evento creado con éxito!');
    }

    public function edit( Event $event )
    {
        return view("admin.events.edit", ['event' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $event->update([
            'title'       => $request->title,
            'description' => $request->description,
            'location'    => $request->location,
            'date_start'  => $request->date_start,
            'cover_image' => $request->cover_image,
            'status'      => $request->status
        ]);

        return back()->with('status', '¡Evento actualizado con éxito!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return back()->with('status', '¡Evento eliminado con éxito!');
    }
}
