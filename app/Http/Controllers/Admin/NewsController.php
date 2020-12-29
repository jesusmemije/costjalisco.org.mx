<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        $periodicos = DB::table('tbl_img')
            ->select('tbl_img.*')
            ->get();  
        
        return view('admin.news.index', ['news' => $news,'periodicos'=>$periodicos]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        News::create([
            'title'   => $request->title,
            'url_periodico'   => $request->url_periodico,
            'status_news'   => $request->status_news,
            'id_img'   => $request->id_img,
        ]);

        return back()->with('status', '¡Noticia creada con éxito!');
    }

    public function edit(News $news)
    {
        return view("admin.news.edit", ['news' => $news]);
    }

    public function update(Request $request, News $news)
    {   
        $news->update([
            'title'       => $request->title,
            'description' => $request->description,
            'content'     => $request->content,
            'author'      => $request->author,
            'published'   => $request->published
        ]);

        return back()->with('status', '¡Noticia actualizada con éxito!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('status', '¡Noticia eliminada con éxito!');
    }

    public function crear_periodico(Request $request){
        // dd($request->all());

        if($request->hasFile('rutaimg')){

                $file=$request->file('rutaimg');
                $name=time().'_'.$file->getClientOriginalName();
                $file->move(public_path().'/news_imgs/',$name);
                
            

                DB::table('tbl_img')->insert([
                    'id'=>'0',
                    'nombreperiodico'=>$request->nombreperiodico,
                    'rutaimg'=>'news_imgs/'.$name,
                ]);
        
            
        }

        return back()->with('status', '¡Periódico guardado con éxito!');
    }
}
