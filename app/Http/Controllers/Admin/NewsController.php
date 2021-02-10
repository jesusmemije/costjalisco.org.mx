<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // Funciones de noticias y periódicos
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $periodicos = DB::table('tbl_img')
            ->select('tbl_img.*')
            ->get();  
            // dd($periodicos);
        
        return view('admin.news.index', ['news' => $news,'periodicos'=>$periodicos]);
    }

    public function store(Request $request)
    {
        // Creamos la noticia
        $fechaActual = date('Y-m-d h:i');
        News::create([
            'title'   => $request->title,
            'url_periodico'   => $request->url_periodico,
            'status_news'   => $request->status_news,
            'id_img'   => $request->id_img,
            'update_published'   => $fechaActual
        ]);

        return back()->with('status', '¡Noticia creada con éxito!');
    }

    public function edit(News $news)
    {
        // Consulta de las imagenes del periodico para asignarle a la noticia
        $periodicos = DB::table('tbl_img')
            ->select('tbl_img.*')
            ->orderBy('tbl_img.nombreperiodico','asc')
            ->get();  
        return view("admin.news.edit", ['news' => $news,'periodicos'=>$periodicos]);
    }

    public function update(Request $request, News $news)
    {   
        // Actualizamos la noticia
        $fechaActual = date('Y-m-d h:i');
        if ($request->status_news=='Publicado') {
            $news->update([
                'title'       => $request->title,
                'id_img' => $request->id_img,
                'url_periodico' => $request->url_periodico,
                'status_news'     => $request->status_news,
                'update_published'   => $fechaActual
            ]);
        } else {
            $news->update([
                'title'       => $request->title,
                'id_img' => $request->id_img,
                'url_periodico' => $request->url_periodico,
                'status_news'     => $request->status_news,
            ]);
        }

        return back()->with('status', '¡Noticia actualizada con éxito!');
    }

    public function destroy(News $news)
    {
        // Eliminación de la noticia
        $news->delete();
        return back()->with('status', '¡Noticia eliminada con éxito!');
    }

    public function crear_periodico(Request $request){
        // Creación del periódico
        if($request->hasFile('rutaimg')){

                $file=$request->file('rutaimg');
                $name=time().'_'.$file->getClientOriginalName();
                
                $url = $_SERVER['DOCUMENT_ROOT'].'\news_imgs';
               
            
                //$file->move(public_path().'\\news_imgs\\',$name);
                $file->move($url,$name);
                
               
            

                DB::table('tbl_img')->insert([
                    'id'=>'0',
                    'nombreperiodico'=>$request->nombreperiodico,
                    'rutaimg'=>'news_imgs/'.$name,
                ]);
        
            
        }

        return back()->with('status', '¡Periódico guardado con éxito!');
    }
    public function delete_periodico($id_img){
        // Eliminación del periódico
        DB::table('tbl_img')->where('id','=',$id_img)->delete();
        return back()->with('status', '¡Periódico eliminado con éxito!');
    }
}
