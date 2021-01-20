<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletter = Newsletter::orderBy('created_at', 'desc')->get();
        return view('admin.newsletter.list_newsletter',['newsletter'=>$newsletter]);
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
        Newsletter::create([
            'title'   => $request->title,
            'status'   => 'Pendiente'
        ]);

        return back()->with('status', 'Boletín creado con éxito!');
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
        $newsletter= Newsletter::find($id);
        return view('admin.newsletter.newsletter',['newsletter'=>$newsletter]);
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
        $fechas=$request->date;
        $fs = str_split($fechas);
        $dias=$fs[0].$fs[1];
        $mess=$fs[3].$fs[4];
        $años=$fs[6].$fs[7].$fs[8].$fs[9];
        $hs=$fs[11].$fs[12];
        $ms=$fs[14].$fs[15];
        $fecha_hora = $años.'-'.$mess.'-'.$dias.' '.$hs.':'.$ms.':00';

        if($request->hasFile('img_rute_new')){

            $file=$request->file('img_rute_new');
            $name=time().'_'.$file->getClientOriginalName();
            $file->move(public_path().'/news_imgs/',$name);
            $ruta='/news_imgs/'.$name;
        
        }
        if (empty($request->img_rute_new)) {
            $img_rute=$request->img_rute;
        } else {
            $img_rute=$ruta;
        }
        
        Newsletter::where('id','=',$id)->update([
            'title'     => $request->title,
            'content'   => $request->content,
            'date'      => $fecha_hora,
            'img_rute'  => $img_rute,
            'status'    => $request->status,

        ]);

        return back()->with('status', 'Boletín actualizado con éxito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $newletter = Newsletter::find($id);
        
        $newletter->delete();
        return back()->with('status', 'Boletín eliminado con éxito!');
    }

    public function mailsubscriber(){
        $subscribers=DB::table('subscribers')
        ->get();

        return view('admin.newsletter.mailsubscriber',['subscribers'=>$subscribers]);
    }

    public function savemailsubscriber(Request $request){
        /*
        $s=DB::table('subscribers')
        ->insert(['email'=>$request->email]);
        return back()->with('status', 'Subscrito correctamente');
        */

        $existe=Subscriber::where('email',$request->email)->get();
        if(sizeof($existe)==0){
            $s=new Subscriber();
            $s->email=$request->email;
            $s->save();
            return back()->with('status', 'Subscrito correctamente');
        }else{
            return back()->with('status', 'El correo ya se encuentra registrado');
        }
      

      
    }
    public function destroymailsubscriber(Request $request){
        $s=Subscriber::find($request->id)->delete();
        return back()->with('status', 'Subscriptor eliminado correctamente');
    }
    

   
}
