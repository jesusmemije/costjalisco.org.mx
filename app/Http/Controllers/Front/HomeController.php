<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function know_more(){
        return view('front.know-more');
    }

    public function about_us(){
        return view('front.about-us');
    }

    public function resources(){
        return view('front.resources');
    }

    public function specific_project(){
        
        return view('front.specific-project');
    }
    public function account(){
        return view('front.account');
    }
    public function organizations(){

        $publicos=DB::table('dir_org')
        ->where('sector','=','Sector Público')
        ->get();
        $academicos=DB::table('dir_org')
        ->where('sector','=','Sector Académico')
        ->get();
        $privados=DB::table('dir_org')
        ->where('sector','=','Sector Privado')
        ->get();
        $organizados=DB::table('dir_org')
        ->where('sector','=','Sociedad Civil Organizada')
        ->get();
        $estrategicos=DB::table('dir_org')
        ->where('sector','=','Aliados Estratégicos')
        ->get();
       
        return view('front.organizations',[

            'publicos'=>$publicos,
            'academicos'=>$academicos,
            'privados'=>$privados,
            'organizados'=>$organizados,
            'estrategicos'=>$estrategicos,
            
        ]);
    }
    public function contactus(){
        return view('front.contactus');
    }
    public function newsletters(){
        return view('front.newsletters');
    }
}
