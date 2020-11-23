<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
  
        return view('admin.news.index', ['news' => $news]);
    }

    public function store(Request $request)
    {
        News::create([
            'title'   => $request->title
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
}
